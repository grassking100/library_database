
searchPublisher=function(condition){
		console.log("Start search Publisher\n");
        $.post("searchPublisher.php?",
        {
			useCondition:condition,
			publisherName: $("#publisherName").val()
        },
        function(data){
			try
			{
			   var json = JSON.parse("\""+data+"\"");		   
			   loadPublisherTable(data,"#PublisherTable");
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


loadPublisherTable=function( myData, tableId)
{
	 $(tableId).bootstrapTable("destroy"); 
	
    $(tableId).bootstrapTable(
	{	
	 columns: [{
			field: 'publisher_id',
			title: 'publisher id'
		}, {
			field: 'name',
			title: 'name'
		}, {
			field: 'phone_number',
			title: 'phone number'
		}, {
			field: 'address',
			title: 'address'
		}],
		data: myData
	}
);
}