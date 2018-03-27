function crtComment(){

	var area = tinymce.get('editor').getContent();
	var currentdate = new Date(); 
	var datetime = currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getDate() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

    var namePost = $('#namePost').text();
    var post_id = $('#skriveniId').val();

    var comment_id = $('#hiddenCommentId').val();

	if(area == "")
	{
		alert("Niste nista komentarisali.");
	}

	var dataAjax = {
		_token : TOKEN,
		id: post_id,
		descr: area,
		date: datetime
	};

	if(comment_id != "")
	{
		dataAjax.parent_id = comment_id;
	}
	$.ajax({
		
		url: BASE_URL + "/insertComment",
		type: "GET",
		data : dataAjax,
		dataType: 'json',
		success:function(data,xhr){
			getComments(data.id);
			tinymce.activeEditor.setContent("");
		},
		error:function(xhr, status, error)
		{
			console.log(xhr);
		}
	});
};
$('#closeThread').click(function(){
	$('#cr').html("");
	var post_id = $('#skriveniId').val();
	$.ajax({
		type:"GET",
		url: BASE_URL + "/closeThread/"+post_id,
		success:function(data,xhr){
			alert(data);
		},
		error:function(error){
			console.log(error);
		}
	});
});

function getComments(id)
{
	$.ajax({
		type: "GET",
		url: BASE_URL + "/comments/" + id,
		success : function(data){
			obezbediPodatke(data);
        },
        error : function (xhr, status, error) {
            console.log(error);
            console.log(xhr);
        }
	});

	function obezbediPodatke(comments)
	{
		var text = "";
		var namePost = $('#namePost').text();
		for(var i=0; i < comments.length; i++)
		{
			text += `
		<div class="card my-1">
			<div class="card-header">
				<div class="col-md-9">
			    	<p class="card-text" id="descr"> `+ comments[i].crt +`</p>
				</div>
				<div class="col-md-3">
				</div>
				<div class="clearfix"></div>
		    </div>

		    <div class="card-block">
		    	<div class="row">
			    	<div class="card col-md-3">
			    		<div id="slika">
			    			<img src="`+ BASE_URL + "/" + comments[i].path +`" id="sl" class="img-responsive">
			    		</div>
			    		<div class="info">
			    			<h6 align="center">Created:</h6>
			    			<dl class="dl-horizontal">
			    				<dt>Role: </dt>
			    				<dd>`+ comments[i].role +`</dd>
			    				<dt>Email: </dt>
			    				<dd><a href="mailto:`+ comments[i].email +`">`+ comments[i].email +`</a></dd>
			    			</dl>
			    		</div>
			    	</div>
			    	<div class="card col-md-9">
			    		<div id="post">
			    			<p align="center">Re: `+ namePost +`</p><hr/>
			    		</div>
			    		<div id="postDescription">
			    			<p>`+ comments[i].text +`</p>
			    		</div>
			    	</div>
		    	</div>
		  	</div>
		  	<div class="col-md-3">
		  		<a href="`+ BASE_URL + `/comments/` + comments[i].cm_id +`/edit/" class="btn btn-xs btn-primary"><span class="fa fa-edit"></span></a>
		  	</div>
		  	<div class="col-md-3">
		  		<button class="btn btn-xs btn-primary" onclick="odgovoriNa(`+ comments[i].cm_id + `)"><span class="fa fa-reply"></span>Replay with quote</button>
		  	</div>
		</div>`;
		}
		$('.comm').append(text);
	}
}


function odgovoriNa($id)
{
	var com_id = $id;

	$.ajax({
		type: "GET",
		url: BASE_URL + "/comments/" + com_id +"/replay/",
		success: function(data,xhr)
		{
			tinymce.activeEditor.setContent("<div><blockquote><cite>"+data[0].name+":</cite>"+data[0].text+"<blockquote></div>");
			$('#hiddenCommentId').val(com_id);
		},
		error: function (xhr, status, error) {
            console.log(error);
            console.log(xhr);
        }
	});
}

function predajFormu()
{
	var thema_id = document.querySelector('input[name=ocena]:checked').value;
	var question_id = $('#hiddenQ').val();

	$.ajax({
		type: "GET",
		url: BASE_URL + "/author/anketa",
		data:{
			thm_id : thema_id,
			q_id : question_id
		},
		dataType: 'json',
		success:function(data,xhr)
		{
			$('#success').html("<div class='alert alert-danger'>Uspeh! Hvala Vam na glasanju!</div>");

		},
		error:function(xhr,status,error){
			$('#success').html(xhr.responseText);
		}
	});
}

