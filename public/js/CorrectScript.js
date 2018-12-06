//Выравнивание зала
var NumCol = $("#row").data("col");
if(NumCol===8){
    $(".row_column").css({"margin-left": "7.5rem" ,});
    $(".column").css({"width": "40px" ,});
    $(".columnBlock").css({"width": "40px" ,});
}
//Выравнивание мест зала
$(".columnBlock").each(function () {
    var RowBlock=$(this).data('row');
    var ColBlock=$(this).data('col');
    $('.column').each(function () {
      if((RowBlock === $(this).data('row'))&&(ColBlock === $(this).data('col'))) {
          $(this).remove();
      }
    })
})
