<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer">

  </script>
</head>

<body>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentModel">
  Launch demo modal
</button> -->

  <!-- Modal ADD -->
  <div class="modal fade" id="studentModel" tabindex="-1" role="dialog" aria-labelledby="studentModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModelLabel">Add Studnts</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="class-form-group">
            <label for="Name">Name:</label>
            <span id="error_name" class="text-danger ms-3"></span>
            <input type="text" class="form-control name" placeholder="Enter Your Name Full name">
          </div>
          <div class="class-form-group">

            <label for="Email">Email:</label>
            <span id="error_email" class="text-danger ms-3"></span>
            <input type="text" class="form-control email" placeholder="Enter Your Email ">
          </div>
          <div class="class-form-group">
            <label for="Phone">Contact:</label><span id="error_phone" class="text-danger ms-3"></span>
            <input type="text" class="form-control phone" placeholder="Enter Your phone">
          </div>
          <div class="class-form-group">
            <label for="Course">Course:</label><span id="error_course" class="text-danger ms-3"></span>
            <input type="text" class="form-control course" placeholder="Enter Your Course">
          </div>

          <div class="form-group">
            <label for="country">Country:</label>
            <span id="error_country" class="text-danger ms-3"></span>
            <input type="text" class="form-control country" placeholder="Enter Country Name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary ajaxstudent-save">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <!-- Edit Model -->


  <div class="modal fade" id="studentEdit" tabindex="-1" role="dialog" aria-labelledby="studentModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModelLabel">Edit Studnts</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="studunts_id_edit" id="sid" value="" class="form-control id">
          <div class="class-form-group">
            <label for="Name">Name:</label>
            <span id="error-name-edit" class="text-danger ms-3"></span>
            <input type="text" class="form-control name" name="name" id="firstname" value="" placeholder="Enter Your Full Name">
          </div>
          <div class="class-form-group">
            <label for="Email">Email:</label>
            <span id="error-email-edit" class="text-danger ms-3"></span>
            <input type="text" class="form-control email" name="email" id="semail" value="" placeholder="Enter Your Email ">
          </div>
          <div class="class-form-group">
            <label for="Phone">Contact:</label><span id="error-phone-edit" class="text-danger ms-3"></span>
            <input type="text" class="form-control phone" name="email" id="sphone" value="" placeholder="Enter Your phone">
          </div>
          <div class="class-form-group">
            <label for="Course">Course:</label>
            <span id="error-course-edit" class="text-danger ms-3"></span>
            <input type="text" class="form-control course" id="scourse" value="" placeholder="Enter Your Course">
          </div>

          <div class="form-group">
            <label for="country">Country:</label>
            <span id="error-country-edit" class="text-danger ms-3"></span>
            <input type="text" class="form-control country" id="scountry" value="" placeholder="Enter Country Name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary ajaxstudent-update">Update</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Model -->

  <!-- delete Model-->
  <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Student Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="studunts_id_delete" id="studentid" value="" class="form-control id">
          <p> <strong style="color: red;">
              Are sure delete records from data base
            </strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary " id="deletestudent">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end Model -->






  <div class="pagetitle">
    <h1>General Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Ajax Complete Crud Using Pop Up Modal</h4>
            <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentModel">Add</a>
          </div>
          <div class="card-body">
            <table class=" table table-striped " id="item-list">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Course</td>
                  <th>Country</td>
                  <th>Action</td>
                </tr>
              </thead>
              <tbody id="show_data">

              </tbody>
            </table>
          </div>


        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#item-list').DataTable({



      });

    });
  </script>



  <script>
    $(document).ready(function() {
      // edit Model show//

      $('#show_data').on('click', '.student_edit', function() {


        var student_id = $('body').find(this).attr('data-students_id');
        // alert(student_id);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('AjaxController/edit') ?>",
          data: {
            'student_id': student_id
          },
          // dataType: "JSON",
          success: function(response) {
            var result = jQuery.parseJSON(response);
            // alert(result.records.email);
            // document.getElementById("sid").value = result.records.id;
            // document.getElementById('firstname').value = result.records.name;

            // document.getElementById('semail').value = result.records.email;
            // document.getElementById('sphone').value = result.records.phone;
            // document.getElementById('scourse').value = result.records.course;
            // document.getElementById('scountry').value = result.records.country;
            $('body').find('.id').val(result.records.id);
            // alert(result.records.id);
            $('body').find('.name').val(result.records.name);
            $('body').find('.email').val(result.records.email);
            $('body').find('.phone').val(result.records.phone);
            $('body').find('.course').val(result.records.course);
            $('body').find('.country').val(result.records.country);


          }
        });
        $('#studentEdit').modal('show');


      });

      $('.ajaxstudent-update').on('click', function() {
        var std_id = $('body').find('#sid').val();
        var name = $('body').find('#firstname').val();
        var email = $('body').find('#semail').val();
        var phone = $('body').find('#sphone').val();
        var course = $('body').find('#scourse').val();
        var country = $('body').find('#scountry').val();
        // alert(scountry);
        if (!name) {

          error_name = 'Name is  required';
          $('#error-name-edit').html(error_name);
        } else {
          error_name = '';
          $('#error-name-edit').text(error_name);
        }
        if (!email) {
          // alert(semail);
          error_email = 'Email is required';
          $('#error-email-edit').html(error_email)
        } else {
          error_email = '';
          $('#error-email-edit').text(error_email);
        }
        if (!phone) {
          // alert(phone);
          error_phone = 'phone number is required';
          $('#error-phone-edit').html(error_phone);
        } else {
          error_phone = '';
          $('#error-phone-edit').text(error_phone);
        }
        if (!course) {
          error_course = 'Course is required';
          $('#error-course-edit').html(error_course)
        } else {
          error_course = '';
          $('#error-course-edit').text(error_course);
        }
        if (!country) {
          error_country = 'Country is required';
          $('#error-country-edit').html(error_country)
        } else {
          error_country = '';
          $('#error-country-edit').text(error_country);
        }
        if (error_name != '' || error_email != '' || error_phone != '' || error_course != '' || error_country != '') {
          return false
        } else {
          var updatedata = {
            'std_id': std_id,
            'name': name,
            'email': email,
            'phone': phone,
            'course': course,
            'country': country,


          }
          // console.log(updatedata);
          $.ajax({
            type: "post",
            url: "<?php echo base_url('AjaxController/update') ?>",
            data: updatedata,
            dataType: "JSON",
            success: function(response) {
              studetn_load();
              $('#studentEdit').modal('hide');
            }
          });
        }

      });



      studetn_load();

      function studetn_load() {
        var html = '';
        $.ajax({
          url: "<?php echo base_url('AjaxController/fetch') ?>",
          type: "get",
          datatype: 'json',
          success: function(response) {
            var result = jQuery.parseJSON(response);
            // console.log(result.students);
            for (var i = 0; i < result.students.length; i++) {
              //onsole.log(result.students[i].name);
              html += `<tr><td>${result.students[i].id}</td>
          <td>${result.students[i].name}</td>
          <td>${result.students[i].email}</td>
          <td>${result.students[i].phone}</td>
          <td>${result.students[i].course}</td>
          <td>${result.students[i].country}</td>
          <td>
            <a href="javascript:void(0)" class="btn btn-info btn-sm student_edit"
            data-students_id="${result.students[i].id}"
            >Edit</a>
           <a href="javascript:void(0)" class="btn btn-danger btn-sm student_delete"
           data-students_id="${result.students[i].id}">Delete</a></td>
          </tr>`;

              $('#show_data').html(html);
            }


          }
        });
      }

      // get Delete Model///
      $('#show_data').on('click', '.student_delete', function() {
        var student_id = $('body').find(this).attr('data-students_id');
        // alert(student_id);
        $('body').find('.id').val(student_id);
        $('#DeleteModal').modal('show')
      });
      //delete ///
      $('#deletestudent').on('click', function() {
        var record_id = $('body').find('#studentid').val();
        // alert(record_id);
        var deletedata = {
          'record_id': record_id,
        }
        // console.log(deletedata);
        $.ajax({
          type: "post",
          url: "<?php echo base_url('AjaxController/delete') ?>",
          data: deletedata,
          dataType: "JSON",
          success: function(response) {
            studetn_load();
            $('#DeleteModal').modal('hide');


          }
        });
      });

      ///Add studetns MOdel////

      $('.ajaxstudent-save').click(function(e) {
        e.preventDefault();

        if ($.trim($('.name').val()).length == 0) {
          error_name = 'Please Enter Full name';
          $('#error_name').text(error_name);
        } else {
          error_name = '';
          $('#error_name').text(error_name);
        }



        if ($.trim($('.email').val()).length == 0) {
          error_email = 'Please Enter Email Address';
          $('#error_email').text(error_email);
        } else {
          error_email = '';
          $('#error_email').text(error_email);
        }


        if ($.trim($('.phone').val()).length == 0) {
          error_phone = 'Please Enter Phone Number';
          $('#error_phone').text(error_phone);
        } else {
          error_phone = '';
          $('#error_phone').text(error_phone);
        }

        if ($.trim($('.course').val()).length == 0) {
          error_course = 'Please Select course';
          $('#error_course').text(error_course);
        } else {
          error_course = '';
          $('#error_course').text(error_course);
        }


        if ($.trim($('.country').val()).length == 0) {
          error_country = 'Enter Country Name';
          $('#error_country').text(error_country);

        } else {
          error_country = '';
          $('#error_country').text(error_country);

        }

        if (error_name != '' || error_email != '' || error_phone != '' || error_course != '' || error_country != '') {
          return false;
        } else {
          // alert('hello');
          var data = {

            'name': $('.name').val(),
            'email': $('.email').val(),
            'phone': $('.phone').val(),
            'course': $('.course').val(),
            'country': $('.country').val(),
          };


          // console.log(data);

          $.ajax({
            url: "<?php echo base_url('AjaxController/store') ?> ",
            method: "POST",

            data: data,

            success: function(response) {
              studetn_load();
              //   var result = jQuery.parseJSON(response);
              //    $('tbody').append(`<tr><td>${result.record_row.id}</td>
              //    <td>${result.record_row.name}</td>
              //    <td>${result.record_row.email}</td>
              //    <td>${result.record_row.phone}</td>
              //    <td>${result.record_row.course}</td>
              //    <td>${result.record_row.country}</td></tr>`);
              //    iziToast.show({
              //     title: 'Hey',
              //     message: 'What would you like to add?',
              //     position: 'topRight',
              // });

              $('#studentModel').modal('hide');
              $('#studentModel').find('input').val('');


              alertify.set('notifier', 'position', 'top-right');
              alertify.success(response.status);
            }
          });
        }


      });
    });
  </script>
</body>

</html>