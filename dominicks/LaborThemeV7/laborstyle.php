<script language="javascript">
window.onresize=relocateFlash;
function relocateFlash()
{
	var rightBarWidth = 430;
	var obj= document.getElementById("object1")
	
	var obj2= document.getElementById("object2")
	
	if(document.body.offsetWidth < (564 + rightBarWidth))
	{
		
		obj.style.display="none";
		obj2.style.display="block";
	}
	else
	{
		obj.style.display="block";
		obj2.style.display="none";
	}
}
</script>



<hr style="color:#CCCCCC;height:2px;" />