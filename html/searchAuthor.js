
searchAuthor=function(condition){
		console.log("Start search Author\n");
        $.post("searchAuthor.php?",
        {
			useCondition:condition,
			authorName: $("#authorName").val()
        },
        function(data){
			try
			{
			   var json = JSON.parse("\""+data+"\"");		   
			   loadAuthorTable(data,"#AuthorTable");
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


loadAuthorTable=function( myData, tableId)
{
	 $(tableId).bootstrapTable("destroy"); 
	
    $(tableId).bootstrapTable(
	{	
	 columns: [{
			field: 'author_id',
			title: 'Author id'
		}, {
			field: 'name',
			title: 'name'
		}, {
			field: 'phone_number',
			title: 'phone number'
		}, {
			field: 'email',
			title: 'email'
		}],
		data: myData
	}
);
}