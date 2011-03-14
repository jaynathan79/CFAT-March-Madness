// The key to this array is the game number and the value is the parent node

parents = new Array(-1, 
	33, 33, 34, 34, 35, 35, 36, 36, 
	37, 37, 38, 38, 39, 39, 40, 40, 
	41, 41, 42, 42, 43, 43, 44, 44, 
	45, 45, 46, 46, 47, 47, 48, 48, 
	49, 49, 50, 50, 51, 51, 52, 52, 
	53, 53, 54, 54, 55, 55, 56, 56, 
	57, 57, 58, 58, 59, 59, 60, 60, 
	61, 61, 62, 62, 63, 63, -1 );


function update(childGameId,target, index) 
{
	var childSel = document.getElementById(childGameId);
	var parentSel = document.getElementById(target);
	if( childSel.options.length > 1 )
	{
		var deselectedChildVal = childSel.options[(childSel.selectedIndex + 1) % 2].value;
		deleteTeam( parentSel, deselectedChildVal );	
	}

	var selectedValue = childSel.options[childSel.selectedIndex].value;
	var selectedText = childSel.options[childSel.selectedIndex].text;
	parentSel.options[index] = new Option(selectedText,selectedValue);
}

function deleteTeam( rootNode, teamToDelete )
{	
	//alert( rootNode.id + " " + teamToDelete + " " + childGameNum + " " + parentGameNum);

	var childGameNum = parseInt( rootNode.id.substring(4) );	
	
	for( i =0; i < rootNode.options.length; i++ )
	{
		if( rootNode.options[i].value == teamToDelete )
		{
			rootNode.options[i] = new Option("","");
		}
	}
	
	
	var parentGameNum = parents[childGameNum];	

	if( parentGameNum != -1 )
	{
		var parentGameId = "game" + parentGameNum;
		var parentSel = document.getElementById( parentGameId );

		deleteTeam( parentSel, teamToDelete);
	}		
}

function resetBracket( startId )
{
	if( startId == null )
	{
		startId = 1;
	}
	var resetBracket = window.confirm('Are you sure that you want to reset this bracket?');
	if( resetBracket )
	{
		for( i = startId; i < parents.length -1; i++ )
		{
			var selectBox = document.getElementById( "game" + parents[i] );
			while (selectBox.options.length > 0) {
				selectBox.options[0] = null;
			}
		}
		return true;
	}
	else
	{
		return false;
	}
}