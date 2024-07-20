import json, os 
import pandas as pd 
from pydantic import BaseModel
from fastapi import FastAPI 
from fastapi.middleware.cors import CORSMiddleware
from pyvi import ViTokenizer 

# import package 
import torch 
from rage import SentenceEmbedding 


os.environ['KMP_DUPLICATE_LIB_OK']='TRUE'


# API
app = FastAPI(
    title="Quick Chatbot API",
)

app.add_middleware(
    CORSMiddleware,
    allow_origins= ['*'],
    allow_credentials= True, 
    allow_methods= ['*'],
    allow_headers= ['*'],
)

# Định nghĩa mô hình dữ liệu cho yêu cầu
class question(BaseModel):
    text: str
    threshold: float= 0.6


# Hàm tính độ tương đồng cosin
def cos_sim(a, b): 
    a_norm= torch.nn.functional.normalize(a, p= 2, dim= -1)
    b_norm= torch.nn.functional.normalize(b, p= 2, dim= -1)

    return torch.mm(a_norm, b_norm.transpose(0, 1))

# Hàm xử lý câu hỏi
def chat(text, data, threshold= 0.6, debug= True): 
    query_embed= model.encode([ViTokenizer.tokenize(text)], return_tensors= 'pt')
    score= cos_sim(query_embed, query_embedding).view(-1, 1)
    index= score.argmax().item()

    if debug: 
        print(f'Search Similarrity score: {score[index]}')

    if score[index] < threshold: 
        return "Xin lỗi, tôi không hiểu câu hỏi của bạn. Nếu có thắc mắc hãy liên hệ số điện thoại 1900.746.384 để được hỗ trợ"
    else: 
        return data.iloc[index, 1]


# Định nghĩa thiết bị và kiểu dữ liệu
device= torch.device("cuda" if torch.cuda.is_available() else 'cpu')
dtype= torch.float16 if torch.cuda.is_available() else torch.float32

# Tải mô hình
model= SentenceEmbedding(aggregation_hidden_states= False, strategy_pooling= "dense_first")
model.load("pytorch_model.bin", key= False)
model.to(device)
##

## load dataset 
data= pd.read_json('query_answer_pair.json')

## index 
query_embedding= model.encode(data.question, return_tensors= 'pt')



# Định nghĩa API endpoint
@app.post('/chat', tags=['Chat Model -- Input: Question -> Output: Answer'])
async def Sentence_embedding(item: question):   
    return chat(item.text, data, item.threshold)


