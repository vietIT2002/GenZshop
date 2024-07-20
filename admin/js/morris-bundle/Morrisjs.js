function chart_data() {
    var ret = [];
    for (var x = 0; x < month.length; x =x+1) {
        ret.push({
            y: month[x],a: masp[x],b: max[x]});
        }
    return ret;
  };

config = {
    data: chart_data(),
    xkey: 'y',
    ykeys: ['b'],
    labels: ["Tháng"],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: true,
    pointFillColors:['#ffffff'],
    pointStrokeColors: ['black'],
    lineColors:['gray','red'],

    hoverCallback: function (index, options, content, row) {
        return  "<div style='margin: 5px;'> Tháng: "+row.y+ "<br> Mã sản phẩm: " + row.a + "<br> Tổng tiền: " + row.b+"đ </div>";
        //return (content);
    }      
};
config.element = 'bar-chart';
Morris.Bar(config);
