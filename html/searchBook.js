
$(document).ready(function(){
    /*$("#bookSubmit").click(function(){
		//alert( "Handler for .click() called." );
		//searchBook(getData);
		//this.loadTable(1,"#BookTable");
		});*/
});
searchBook=function(condition){
		console.log("Start search book\n");
        $.post("searchBook.php?",
        {
		  useCondition:condition,
          title: $("#bookTitle").val(),
          author: $("#bookAuthor").val(),
		  operation:$("#operation").val()
        },
        function(data){
			loadTable(data,"#BookTable");
        });
		//alert(condition);
		return false;
}


loadTable=function( myData, tableId)
{
	 $(tableId).bootstrapTable("destroy"); 
	//console.log(myData);
    $(tableId).bootstrapTable(
	{	
	 columns: [{
			field: 'book_name',
			title: 'Title'
		}, {
			field: 'author_name',
			title: 'Author'
		}, {
			field: 'language',
			title: 'Language'
		}, {
			field: 'publish_date',
			title: 'publish date'
		}, {
			field: 'publisher_name',
			title: 'publisher'
		}],
		data: myData
	}
);
}