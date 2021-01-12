<!DOCTYPE html>

<!---  HEAD CODE STARTS -->
<?php 
include("template/head.html")
?>
<!---  NHEAD CODE ENDS -->
<body>

<!---  NAVBAR CODE STARTS -->
<?php
include("template/navbar.php");
?>
<!---  NAVBAR CODE ENDS-->

<div class="container-fluid ">    
  <div class="row content">
    <div class="col-sm-2 sidenav ">
    
    </div>

    <div class="col-sm-8 text-left"> 
  <br>
      <br>
     <form class="form-horizontal"  method="POST" id="signupform" name="signupform">
<fieldset>
<!-- Form Name -->
<!-- Text input-->

<div class="form-group">
  <label class="col-sm-4 control-label">Birth date<label style="color:blue">*</label></label>
  <div class="col-sm-5">
  {% if student.birth_date %}
  <input id="birth_date" name="birth_date" type="date"  placeholder="01/01/1995"   class="form-control input-md"  value = "{{birth_date}}">
  {% else %}
  <input id="birth_date" name="birth_date" type="date"  placeholder="01/01/1995"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>




<div class="form-group">
  <label class="col-sm-4 control-label">Aadhar card number</label>
  <div class="col-sm-5">
  {% if student.aadhar_number %}
  <input id="aadhar_number" name="aadhar_number" type="text"  placeholder="6048 1136 9599"   class="form-control input-md"  value = "{{student.aadhar_number}}">
  {% else %}
  <input id="aadhar_number" name="aadhar_number" type="text"  placeholder="6048 1136 9599"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>


<div class="form-group">
  <label class="col-sm-4 control-label">Pan card number</label>
  <div class="col-sm-5">
  {% if student.pan_number %}
  <input id="pan_number" name="pan_number" type="text"  placeholder="PSFWG3008K"   class="form-control input-md"  value = "{{student.pan_number}}">
  {% else %}
  <input id="pan_number" name="pan_number" type="text"  placeholder="PSFWG3008K"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>


<div class="form-group">
  <label class="col-sm-4 control-label">Passport number</label>
  <div class="col-sm-5">
  {% if student.passport_number %}
  <input id="pan_number" name="passport_number" type="text"  placeholder="340008765"  class="form-control input-md"  value = "{{student.passport_number}}">
  {% else %}
  <input id="passport_number" name="passport_number" type="text"  placeholder="340008765"  class="form-control input-md"  >
  {% endif %}
  </div>
</div>
<div class="form-group">
  <label class="col-sm-4 control-label">Current Address</label>
  <div class="col-sm-5">
  {% if student.cur_address %}
  <input id="cur_address" name="cur_address" type="text"  placeholder="Katraj ,Pune"   class="form-control input-md"  value = "{{student.cur_address}}">
  {% else %}
  <input id="cur_address" name="cur_address" type="text"  placeholder="Katraj ,Pune"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>


<div class="form-group">
  <label class="col-sm-4 control-label">Permanent Address</label>
  <div class="col-sm-5">
  {% if student.per_address %}
  <input id="per_address" name="per_address" type="text"  placeholder="Mumbai"   class="form-control input-md"  value = "{{student.per_address}}">
  {% else %}
  <input id="per_address" name="per_address" type="text"  placeholder="Mumbai"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>

<div class="form-group">
  <label class="col-sm-4 control-label">City<label style="color:blue">*</label></label>
  <div class="col-sm-5">
  {% if student.city %}
  <input id="city" name="city" type="text"  placeholder="Mumbai"   class="form-control input-md"  value = "{{student.city}}">
  {% else %}
  <input id="city" name="city" type="text"  placeholder="Mumbai"   class="form-control input-md"  >
  {% endif %}
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  
  <div class="col-sm-4 text-center" align="center" style="margin-left:-2%;margin-right:4%;">
      {% if student.course == "BE" %}
  <button type="button" class="btn btn-info" onclick="editBeMarksPage()">Back</button>
      {% else %}
  <button type="button" class="btn btn-info" onclick="editMeMarksPage()">Back</button>
    {% endif %}
  <button type="button" class="btn btn-info" onclick="editOtherDetails()">Next</button>
  </div>
</div>
</fieldset>
</form>

 </div>


 <div class="col-sm-2 sidenav">
<!--- Side navigation data paste here-->
</div>


</div>
</div>


<footer class="container-fluid text-center">
 <div>© 2016-2017 <a href="http://pict.edu">PICT.EDU</a>, All rights reserved.<br/>
<p><a href="/developers-page/">Developers</a></p></div>
</footer>
<script>

function editBeMarksPage(argument) {
    window.location.href = "/peditbemarks";
    // body...
}

function editMeMarksPage(argument) {
    window.location.href = "/peditmemarks";
    // body...
}
function editOtherDetails() {
        console.log('signupform');
        var signupform = $('#' + 'signupform');
        var csrftoken = getCookie('csrftoken');
        var birth_date = document.getElementById("birth_date").value;
        var city = document.getElementById("city").value;
        if(birth_date==""){
            alert("Enter Birth Date");
            return;
        }
        else if(city==""){
            alert("Enter city");
            return;
        }

            $.ajax({
                type: "POST",
                url: '/editotherdetails/',
                data: signupform.serialize() + '&csrfmiddlewaretoken=' + csrftoken,
                success: function(message) {
                console.log(message);
                    if (message =='success') {
                       window.location.href = "/presume/";
                    }
                    else
                    {
                    alert('Error');
                    }
                },
                error: function(xhr, errmsg, err) {
                    alert('Error');
                },
            });

    }

</script>
</body>
</html>