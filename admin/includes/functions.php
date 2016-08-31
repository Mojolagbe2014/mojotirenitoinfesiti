<?php

	function Redirect($page)
	{
		if(!headers_sent())
		{
			header("location:$page");
			exit;
		}else{
			echo "<script>location.href=$page</script>";
			exit;
		}
	}
?>