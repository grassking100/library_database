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
			 console.log(targetData);
			targetData.my+=1;
            console.log(targetData);
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