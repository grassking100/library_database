getData={my:12};
$(document).ready(function(){
    $("#bookSubmit").click(searchBook(getData));
});
function searchBook(targetData){
        $.post("searchBook.php?",
        {
          title: $("#bookTitle").val(),
          author: $("#bookAuthor").val()
        },
        function(data){
			 console.log(data);
			getData=data;
            //console.log(data);
        });
}
loadTable=function( myData, tableId)
{
	var $table = $(tableId);
	$(function () {
    $table.bootstrapTable({
        data: myData
    });
});
}