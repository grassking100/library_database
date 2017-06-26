
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
			try
			{
			   var json = JSON.parse("\""+data+"\"");		   
			   loadBookTable(data,"#BookTable");
			}
			catch(e)
			{
			   alert("Query fail");
			}
			//
        });
		//alert(condition);
		return false;
}


loadBookTable=function( myData, tableId)
{
	 $(tableId).bootstrapTable("destroy"); 
	
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