login=function(){
		console.log("Start search user\n");
        $.post("account.php?",
        {
          account :$("#account").val(),
          _password: $("#password").val()
        },
        function(data){
			try
			{
			   var json = JSON.parse(data);		
			   if(json.length!=0)
			   {
				   loadUserTable(json,"#accountTable");
			   }
			   else
			   {
				   alert("Query fail");
			   }
			   
			}
			catch(e)
			{
			   alert("Query fail");
			}
        });
		return false;
}
loadUserTable=function( myData, tableId)
{
	console.log(myData);
	$(tableId).bootstrapTable("destroy"); 
    $(tableId).bootstrapTable(
	{	
	 columns: [{
			field: 'name',
			title: 'name'
		}, {
			field: 'account',
			title: 'account'
		}, {
			field: 'isAdministrator',
			title: 'isAdministrator'
		}, {
			field: 'birthday',
			title: 'birthday'
		}, {
			field: 'email',
			title: 'email'
		}],
		data: myData
	}
);
}