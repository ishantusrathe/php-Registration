base_url = document.getElementsByTagName('base')[0].href;

$(document).ready(function() {
 	$( ".datepicker" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth : true,
      changeYear : true,
      yearRange: '-100y:c+nn',
      // maxDate: '-1d'
    });
});
function sign_in() 
{
	// alert(base_url);

	email = $('#email').val();	
	password = $('#password').val();	

	$.ajax({
    	url: base_url+"Login/check_login", 
    	type : "POST",
    	data: {email : email , password :password},
    	success: function(result)
    	{
    		if (result == 'valid')
			{
				window.location.href = base_url + "Dashboard";
			}
			else if(result == 'Susepend'){
				alert('User Are Suspended Now Please Contact Scheme Hub!');
			}
			else
			{
				alert('Please Enter Valid Username and Password');
			}
        }
    });
}




// news and updates starts

function change_news_img() 
{
    var oFReader = new FileReader();
    oFReader.readAsDataURL($('#news_img')[0].files[0]);

    oFReader.onload = function (oFREvent) {
        $('#priview_news_img').attr('src', oFREvent.target.result);
    }
}


function save_booth()
{
	$('#loading').show();
	booth_name = $('#add_booth').val();
	var formData = new FormData();
	formData.append('booth_name',booth_name);
	$.ajax({
    	url: base_url+"Booth_data/save_booth", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		alert(result);
    		$('#loading').hide();
    		location.reload();
        }
    });
	
}


function save_news_and_updates()
{
	$('#loading').show();

	title = $('#title').val();
	user_id = $('#user_id').val();
	subtitle = $('#subtitle').val();
	category = $('#category').val();
	loction_news = $('#loction_news').val();
	date_news = $('#date_news').val();
	news_summary = $('#news_summary').val();

	var formData = new FormData();
	formData.append('title',title);
	formData.append('subtitle',subtitle);
	formData.append('user_id',user_id);
	formData.append('category',category);
	formData.append('loction_news',loction_news);
	formData.append('date_news',date_news);
	formData.append('news_summary',news_summary);
	formData.append('file1',$('#news_img')[0].files[0]);


	$.ajax({
    	url: base_url+"News_and_updates/save_news_and_updates", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		
    		$('#loading').hide();
    		location.reload();
        }
    });
}

function delete_news_and_update(id)
{
	$.ajax({
    	url: base_url+"News_and_updates/delete_news_and_update", 
    	type : "POST",
    	data: {id : id},
    	success: function(result)
    	{
    		if (result == 'Valid')
    		{
    			location.reload();
    		}
        }
    });
}

function update_news_and_updates(id)
{
	$('#loading').show();

	title = $('#title').val();
	status = $('#status').val();
	subtitle = $('#subtitle').val();
	category = $('#category').val();
	loction_news = $('#loction_news').val();
	date_news = $('#date_news').val();
	news_summary = $('#news_summary').val();

	var formData = new FormData();
	formData.append('id',id);
	formData.append('title',title);
	formData.append('status',status);
	formData.append('subtitle',subtitle);
	formData.append('category',category);
	formData.append('loction_news',loction_news);
	formData.append('date_news',date_news);
	formData.append('news_summary',news_summary);
	formData.append('file1',$('#news_img')[0].files[0]);


	$.ajax({
    	url: base_url+"News_and_updates/update_news_and_updates", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		$('#loading').hide();
    		location.reload();
        }
    });
}


// Politician 

function add_question(id)
{	
	// alert(id);
	
	question = $('#question').val();
	unique_id = $('#unique_id').val();

	var formData = new FormData();
	formData.append('id',id);
	formData.append('question',question);
	formData.append('unique_id',unique_id);

	$.ajax({
    	url: base_url+"Politician/save_questions", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		$('#loading').hide();
    		location.reload();
        }
    });


}

// gallery

function add_img_gallery()
{
	var formData = new FormData();
	formData.append('file1',$('#gallery_img')[0].files[0]);
	formData.append('user_id',$('#user_id').val());
	formData.append('title',$('#title').val());
	formData.append('description',$('#description').val());
	formData.append('date',$('#date').val());

	$.ajax({
    	url: base_url+"Gallery/save_gallery", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		
    		// $('#loading').hide();
    		// location.reload();
    		table.ajax.reload();
        }
    });
}

function delete_gallery_img(id)
{
	var r = confirm("Are Want to Delete This Image!");
	if (r == true) {
		$.ajax({
	    	url: base_url+"Gallery/delete_gallery_img", 
	    	type : "POST",
	    	data: {id : id},
	    	success: function(result)
	    	{
	    		
	    		table.ajax.reload();
	        }
    	});
    }
}

// add user
function checked_user_age()
{
	dob = $('#dob').val();

	dob = new Date(dob);
	var today = new Date();
	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
	$('#age').val(age);
}


function save_user()
{
	$('#loading').show();

	f_name = $('#f_name').val();
	m_name = $('#m_name').val();
	l_name = $('#l_name').val();
	gender = $("input[name='gender']:checked").val();
	dob = $('#dob').val();
	mobile = $('#mobile').val();
	address = $('#address').val();
	city = $('#city').val();
	state = $('#state').val();
	pin = $('#pin').val();
	role =$('#role').val();
	vidhansabha_area = $('#vidhansabha_area').val();
	user_name = $('#user_name').val();
	password = $('#password').val();

	var formData = new FormData();
	formData.append('f_name',f_name);
	formData.append('m_name',m_name);
	formData.append('l_name',l_name);
	formData.append('gender',gender);
	formData.append('dob',dob);
	formData.append('mobile',mobile);
	formData.append('address',address);
	formData.append('city',city);
	formData.append('state',state);
	formData.append('pin',pin);
	formData.append('role',role);
	formData.append('vidhansabha_area',vidhansabha_area);
	formData.append('user_name',user_name);
	formData.append('password',password);



	$.ajax({
    	url: base_url+"Politician/save_politician", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		
    		$('#loading').hide();
    		location.reload();
        }
    });
}

function save_citizen()
{
	$('#loading').show();
	user_id = $('#user_id').val();

	name = $('#name').val();
	mobile = $('#mobile').val();
	gender = $("input[name='gender']:checked").val();
	survy = $("input[name='survy']:checked").val();
	locat = $('#location').val();
	survy_by = $('#survy_by').val();
	panchayat = $("#input[name='panchayat']:checked").val();
	
	var formData = new FormData();
	formData.append('user_id',user_id);
	formData.append('name',name);
	formData.append('mobile',mobile);
	formData.append('survy',survy);
	formData.append('gender',gender);
	formData.append('locat',locat);
	formData.append('survy_by',survy_by);
	formData.append('panchayat',panchayat);
	
	$.ajax({
    	url: base_url+"Citizen/insert_citizen", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		alert(result);
    		$('#loading').hide();
    		location.reload();
        }
    });
}
	
	function save_boothinfo()
	{
		
	$('#loading').show();
	user_id = $('#user_id').val();

	booth_id = $('#booth_id').val();
	date = $('#date').val();
	pamplate = $('#pamplate').val();
	
	comp = $('#comp').val();
	mandal_upa = $('#mandal_upa').val();
	sect_p = $('#sect_p').val();
	
	poster = $('#poster').val();
	mandl_a = $('#mandl_a').val();
	visa = $('#visa').val();
	mohal = $('#mohal').val();
	akj = $('#AKJ').val();
	grj = $('#GRJ').val();
	
	sidibat = $('#sidibat').val();
	newmem = $('#newmem').val();
	samiti = $("input[name='samiti']:checked").val();
	listname = $("input[name='listname']:checked").val();
	
	othr=$('#othr').val();
	
	
	var formData = new FormData();
	formData.append('user_id',user_id);
	formData.append('booth_id',booth_id);
	formData.append('pamplate',pamplate);
	formData.append('comp',comp);
	formData.append('date',date);
	formData.append('mandal_upa',mandal_upa);
	formData.append('sect_p',sect_p);
	formData.append('poster',poster);
	
	formData.append('mandl_a',mandl_a);
	formData.append('visa',visa);
	formData.append('mohal',mohal);
	formData.append('akj',akj);
	
	formData.append('grj',grj);
	formData.append('sidibat',sidibat);
	formData.append('newmem',newmem);
	formData.append('samiti',samiti);
	formData.append('listname',listname);
	formData.append('othr',othr);
	
	$.ajax({
    	url: base_url+"Booth_data/insert_basicinfo", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		alert(result);
    		$('#loading').hide();
    		location.reload();
        }
    });
		
		
	}
	
	
function update_user()
{
	$('#loading').show();
	user_id = $('#user_id').val();

	f_name = $('#f_name').val();
	m_name = $('#m_name').val();
	l_name = $('#l_name').val();
	gender = $("input[name='gender']:checked").val();
	dob = $('#dob').val();
	mobile = $('#mobile').val();
	address = $('#address').val();
	city = $('#city').val();
	state = $('#state').val();
	pin = $('#pin').val();
	vidhansabha_area = $('#vidhansabha_area').val();
	user_name = $('#user_name').val();
	password = $('#password').val();

	var formData = new FormData();
	formData.append('user_id',user_id);
	formData.append('f_name',f_name);
	formData.append('m_name',m_name);
	formData.append('l_name',l_name);
	formData.append('gender',gender);
	formData.append('dob',dob);
	formData.append('mobile',mobile);
	formData.append('address',address);
	formData.append('city',city);
	formData.append('state',state);
	formData.append('pin',pin);
	formData.append('vidhansabha_area',vidhansabha_area);
	formData.append('user_name',user_name);
	formData.append('password',password);



	$.ajax({
    	url: base_url+"Politician/update_politician", 
    	type : "POST",
    	data: formData,
    	processData:false,
	    contentType:false,	
    	success: function(result)
    	{
    		
    		$('#loading').hide();
    		location.reload();
        }
    });
}



// clients 

function show_user_anwsers(id)
{
	$.ajax({
    	url: base_url+"Users/get_clients_answser", 
    	type : "POST",
    	data: {id:id},	
    	// dataType :'json',
    	success: function(result)
    	{
    		$('#show_user_detils .modal-dialog').html(result);
    		$('#show_user_detils').modal('show');
        }
    });
}

function show_user_info(id)
{
	$.ajax({
    	url: base_url+"Users/get_clients_info", 
    	type : "POST",
    	data: {id:id},	
    	// dataType :'json',
    	success: function(result)
    	{
    		$('#show_user_detils .modal-dialog').html(result);
    		$('#show_user_detils').modal('show');
        }
    });
}

function genrate_user_report()
{
	start_date= $('#start_date').val();
	end_date= $('#end_date').val();

	$.ajax({
    	url: base_url+"Reports/genrate_user_report", 
    	type : "POST",
    	data: {start_date:start_date,end_date:end_date},	
    	// dataType :'json',
    	success: function(result)
    	{
			window.open(base_url + result,'_blank');
        }
    });
}
function genrate_user_ans_report()
{
	start_date= $('#start_date').val();
	end_date= $('#end_date').val();

	$.ajax({
    	url: base_url+"Reports/genrate_user_ans_report", 
    	type : "POST",
    	data: {start_date:start_date,end_date:end_date},	
    	// dataType :'json',
    	success: function(result)
    	{
    		// console.log(result);
			window.open(base_url + result,'_blank');
        }
    });
}

function save_role()
{
	add_role=$('#add_role').val();
	$.ajax({
    	url: base_url+"Politician/insert_role", 
    	type : "POST",
    	data: {add_role:add_role},	
    	// dataType :'json',
    	success: function(result)
    	{
    		 alert('Data Successfully Inserted');
			 location.reload();
        }
    });
}