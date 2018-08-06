<footer class="container" style="margin-top: 50px;">
	
		<p class="text-center"><?php echo footer();?></p>
		
	</footer>

	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJhbPahMAQ7xWDlwHF8MmVU4SDkzgtXOY&signed_in=true&callback=initMap" type="text/javascript"></script>

	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.3/loadingoverlay.min.js"></script>



	<script type="text/javascript" src="<?php echo base_url();?>assets/js/canvasjs.min.js"></script>



	<script type="text/javascript">

		jQuery.extend(jQuery.validator.messages, {
		    required: "** กรุณากรอก.",
		    remote: "มีผู้ใช้งานแล้ว",
		    email: "Please enter a valid email address.",
		    url: "Please enter a valid URL.",
		    date: "Please enter a valid date.",
		    dateISO: "Please enter a valid date (ISO).",
		    number: "Please enter a valid number.",
		    digits: "Please enter only digits.",
		    creditcard: "Please enter a valid credit card number.",
		    equalTo: "รหัสผ่านยืนยันไม่ตรงกัน",
		    accept: "Please enter a value with a valid extension.",
		    maxlength: jQuery.validator.format("กรอกได้สูงสุด {0} ตัวอักษร."),
		    minlength: jQuery.validator.format("กรอกต่ำสุด {0} ตัวอักษร."),
		    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
		});
		$(function() {



			$("#modal").on("show.bs.modal", function(e) {
				$(this).find(".modal-content").html('Loading...');
			    var link = $(e.relatedTarget);
			    $(this).find(".modal-content").load(link.attr("href"));
			});


			$("input[name=type_school]").on('click', function() {
				var type = $(this).val();
				$.post('<?php echo site_url('data/area_type_getdata');?>', { type: type }, function(res) {
					$("select[name=area_type_id]").html(res);
				});
			})

			
			$("#checkall").on('click', function() {
				$("input[type=checkbox]").prop('checked', $(this).prop('checked'));
			})
			$("#md").on('show.bs.modal', function(e) {
	           // e.preventDefault();
	            var link = $(e.relatedTarget);
	           
	            $(this).find('.modal-body').load(link.attr('href'));
	        })

			$("#save_room").on('click', function() {
				
				$.post('<?php echo site_url('member/save_room');?>', { 
					'term_id': '<?php echo $this->uri->segment(3);?>',
					'year_id': '<?php echo $this->uri->segment(4);?>',
					'room_no': $("#room_no").val(),
					'room_boy': $("#room_boy").val(),
					'room_girl': $("#room_girl").val(),
					'rmid': $("#rmid").val(),
				 }, function() {
					top.location.href="<?php echo site_url('member/school/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'#tab7');?>";
					top.location.reload();
				})
			});


			if(window.location.hash != "") {
			      $('a[href="' + window.location.hash + '"]').click();
			      return false;
			  }

			$(".date").datetimepicker({
				format: 'YYYY-MM-DD'
			});

			$("select[name=province_id]").on('change', function() {
				var val = $(this).val();
				$.post('<?php echo site_url('auth/getamphur');?>', { province_id: val }, function(res) {
					$("select[name=amphur_id]").html('<option value=""> อำเภอ </option>');
					$.each(res, function(key, value) {
						$('<option value="' + value.AMPHUR_ID +'">' + value.AMPHUR_NAME + '</option>').appendTo($("select[name=amphur_id]"));
					});
				}, 'json');
			})


			$("select[name=province_id2]").on('change', function() {
				var val = $(this).val();
				$.post('<?php echo site_url('auth/list_school_province');?>', { province_id: val }, function(res) {
					$("select[name=amphur_id]").html('<option value=""> สถานศึกษา </option>');
					$.each(res, function(key, value) {
						$('<option value="' + value.school_id +'">' + value.school_name + '</option>').appendTo($("select[name=school_id]"));
					});
				}, 'json');
			})

			$("select[name=amphur_id]").on('change', function() {
				var val = $(this).val();
				$.post('<?php echo site_url('auth/getdistrict');?>', { amphur_id : val }, function(res) {
					$("select[name=district_id]").html('<option value=""> ตำบล </option>');
					$.each(res, function(key, value) {
						$('<option value="' + value.DISTRICT_ID +'">' + value.DISTRICT_NAME + '</option>').appendTo($("select[name=district_id]"));
					});
				}, 'json');
			})

			$("select#area_type_id").on('change', function() {
		      var val = $(this).val();
		      $.post('<?php echo site_url('auth/list_school2');?>', { area: val }, function(res) {
		        var opt = '';
		        $("select[name=school], select#school_id").html('<option value="">- - - สถานศึกษา - - -</option>')
		        $.each(res, function(key, val) {
		          otp = '<option value="' + val.school_id + '">' + val.school_name + '</option>';
		          $("select[name=school], select#school_id").append(otp);

		        })
		      }, 'json');
		    });

		    $("form#login").validate();
		    $("form#frmadd").validate();
		    $("form#register").validate({
		      rules: {
		        username: {
		          required: true,
		          remote: '<?php echo site_url('auth/check_idcard');?>'
		        },

		        email: {
		          required: true,
		          email: true,
		          remote: '<?php echo site_url('auth/check_email');?>'
		        },

		        confirm_password: {
		          equalTo: "#password"
		        }
		      },
		      submitHandler: function(form) {
		        $.post($(form).attr('action'), $(form).serialize(), function(res) {
		          if (res.result) {
		            $(".alert").html('<strong>บันทึกข้อมูลเรียบร้อย</strong><br>ต้องได้รับการอนุมัติจากผู้ดูแลระบบก่อน ถึงสามารถเข้าใช้งานได้</a>');
		            $(".alert").removeClass('alert-danger').addClass('alert-success').show();
		            $(".alert").show();
		          } else {
		            $(".alert").html(res.msg);
		            $(".alert").removeClass('alert-success').addClass('alert-danger').show();
		          }
		          $("html, body").animate({ scrollTop: 0 }, 1000);


		        }, 'json');
		      }
		    });

		    $("form#memberupdate").validate({
		      rules: {
		        
		        confirm_password: {
		          equalTo: "#password"
		        }
		      },
		      submitHandler: function(form) {
		        $(form).submit();
		      }
		    });


		});

		$(function() {
			//getSchool();

			$("a.delete-level").on('click', function() {
				var ssid = $(this).attr('data-id');
				var conf = confirm('ต้องการลบหรือไม่');

				if (conf) {

					$.post('<?php echo site_url('member/delete_level');?>', { ssid, ssid }, function() {
						top.location.reload();
					});
				}
			})

			$("#list_area_id").on('change', function() {
				getSchool();
			})

			$("#save_level").on('click', function() {
				var data = {
					level: $("#level").val(),
					boy: $("#boy").val(),
					girl: $("#girl").val(),
					school_main_name: $("#school_main_name").val()
				}
				$.post('<?php echo site_url('member/save_room_level');?>', data, function() {
					top.location.href="<?php echo site_url('member/school/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'#tab2');?>"
					top.location.reload();
				});
			});

			$("#state_report_1").on('click', function() {
				$("#data-result").LoadingOverlay("show");
				if ($("#year_id").val() == '') {
					$("#year_id").focus();
					return false;
				}

				if ($("#report_type").val() == '') {
					$("#report_type").focus();
					return false;
				}

				$("#data_result").show();
				$("#data_result div.panel-body").empty();
				$("#data_result div.panel-body").css('padding', '50px');

				$('#data_result div.panel-body').LoadingOverlay("show", {
						image       : "",
						fontawesome : "fa fa-cog fa-spin"
				});
				
				$.post('<?php echo site_url('state/list_report');?>', $("#frm-state-report").serialize(), function(res) {
					setTimeout(function() {
						$("#data_result div.panel-body").css('padding', '10px');
						$('#data_result div.panel-body').LoadingOverlay("hide");
						$("#data_result div.panel-body").html(res);
					}, 500);

				})
			})

			

		})

		function getSchool() {
			var area_id = $("#list_area_id").val();
			$("#school_sub_id").html('<option value=""> เลือกสถานศึกษา </option>');
			$.post('<?php echo site_url('auth/list_school_area');?>', { area_id : area_id }, function(res) {
				$.each(res, function(key, v) {
					$('<option value="' + v.school_id +'">' + v.school_name + '</option>').appendTo($("#school_sub_id"));
				});
			}, 'json');
		}


		/*CKEDITOR.replace( 'editor1' );*/

		

	</script>

	<script>

	 //<![CDATA[
		bkLib.onDomLoaded(function() {
        new nicEditor().panelInstance('editor1');
        /*new nicEditor({fullPanel : true}).panelInstance('area2');
        new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
        new nicEditor({maxHeight : 100}).panelInstance('area5');*/
  });
  //]]>

</script>
</body>
</html>