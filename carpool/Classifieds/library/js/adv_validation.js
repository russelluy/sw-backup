$(document).ready(function(){

	//global vars

	var form = $("#createjob_frm");

	var termid = $("#termid");

	var termidInfo = $("#termidInfo");

	var post_title = $("#post_title");

	var post_titleInfo = $("#post_titleInfo");

	var post_location = $("#post_location");

	var post_locationInfo = $("#post_locationInfo");

	var description = $("#description");

	var descriptionInfo = $("#descriptionInfo");

	var owner_name = $("#owner_name");

	var owner_nameInfo = $("#owner_nameInfo");

	var owner_email = $("#owner_email");

	var owner_emailInfo = $("#owner_emailInfo");

	

	//On blur

	termid.blur(validate_termid);

	post_title.blur(validate_post_title);

	post_location.blur(validate_post_location);

	owner_name.blur(validate_owner_name);

	owner_email.blur(validate_owner_email);



	//On key press

	termid.keyup(validate_termid);

	post_title.keyup(validate_post_title);

	post_location.keyup(validate_post_location);

	owner_name.keyup(validate_owner_name);

	owner_email.keyup(validate_owner_email);

	

	//On Submitting

	form.submit(function(){

		if(validate_termid() & validate_post_title() & validate_post_location() & validate_description() & validate_owner_name() & validate_owner_email())

			return true

		else

			return false;

	});

	

	//validation functions

	function validate_termid()

	{

		if($("#termid").val() == '')

		{

			termid.addClass("error");

			termidInfo.text("Please Select a City");

			termidInfo.addClass("message_error");

			return false;

		}

		else{

			termid.removeClass("error");

			termidInfo.text("");

			termidInfo.removeClass("message_error");

			return true;

		}

	}

	

	function validate_post_title()

	{

		if($("#post_title").val() == '')

		{

			post_title.addClass("error");

			post_titleInfo.text("Please Enter a Title");

			post_titleInfo.addClass("message_error");

			return false;

		}

		else{

			post_title.removeClass("error");

			post_titleInfo.text("");

			post_titleInfo.removeClass("message_error");

			return true;

		}

	}

	

	function validate_post_location()

	{

		if($("#post_location").val() == '')

		{

			post_location.addClass("error");

			post_locationInfo.text("Please Enter a Location");

			post_locationInfo.addClass("message_error");

			return false;

		}

		else{

			post_location.removeClass("error");

			post_locationInfo.text("");

			post_locationInfo.removeClass("message_error");

			return true;

		}

	}

	function validate_description()

	{

		/*if($("#description").val() == '')

		{

			description.addClass("error");

			descriptionInfo.text("Please Enter Description");

			descriptionInfo.addClass("message_error");

			return false;

		}else*/
		{
			var description_max_len = $("#description_max_len").val();
	
			var description_str_new = $("#description").val();
			var description_str = tinyMCE.activeEditor.getContent().replace(/<[^>]+>/g, '');

			if(description_max_len > 0)
	
			{
				if(description_str.length > description_max_len)
	
				{
					descriptionInfo.text("Description should be less than or equal to "+description_max_len);
	
					descriptionInfo.addClass("message_error");
	
					return false;
	
				}
	
				else{
	
					descriptionInfo.text("");
	
					descriptionInfo.removeClass("message_error");
	
					return true;
	
				}		
	
			}
		}

	}

	function validate_owner_name()

	{

		if($("#owner_name").val() == '')

		{

			owner_name.addClass("error");

			owner_nameInfo.text("Please Enter Owner Name");

			owner_nameInfo.addClass("message_error");

			return false;

		}

		else{

			owner_name.removeClass("error");

			owner_nameInfo.text("");

			owner_nameInfo.removeClass("message_error");

			return true;

		}

	}

	

	function validate_owner_email()

	{

		var isvalidemailflag = 0;

		if($("#owner_email").val() == '')

		{

			isvalidemailflag = 1;

		}else

		if($("#owner_email").val() != '')

		{

			var a = $("#owner_email").val();

			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

			//if it's valid email

			if(filter.test(a)){

				isvalidemailflag = 0;

			}else{

				isvalidemailflag = 1;	

			}

		}

		if(isvalidemailflag)

		{

			owner_email.addClass("error");

			owner_emailInfo.text("Please Enter valid Email ID");

			owner_emailInfo.addClass("message_error");

			return false;

		}else

		{

			owner_email.removeClass("error");

			owner_emailInfo.text("");

			owner_emailInfo.removeClass("message_error");

			return true;

		}

		

	}

	

});