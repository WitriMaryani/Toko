var tbVocation;
$(document).ready(function(){
	tbVocation = $('#table-vocation').DataTable({
		order: [1, 'asc'],
        ajax: SITE_URL + '/master/vocation/get_data',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        columns: [
            { data: 'option', name: 'option', orderable: false, searchable: false, class: 'text-center' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' }
        ]
    });

    $('#form-add-edit').validate({
		rules: {
        code: {
            remote: {
                    url: SITE_URL + '/master/vocation/validate',
                    type: 'post',
                    data: {
                            code: function() { return $('input[name="code"]').val()},
                            id: function() { return $('input[name="id"]').val() != undefined ? $('input[name="id"]').val() : '' },
                            _token : function() { return $('meta[name="csrf-token"]').attr('content')}
                          }
                      }
                  },
      	},
    messages: {
        code: {
            remote: 'Code with {0} has been used'
        }
    },
    onkeyup: function(element){$(element).valid()},
	});


	$('#btn-save').click(function(){

		var form = $('#form-add-edit').validate();
		var data = $('#form-add-edit').serializeArray();
		var id = $('[name="id"]').val();
		var url = (!id) ? 'master/vocation' : 'master/vocation/' + id;
		var type = (!id) ? 'POST' : 'PUT';
		var btn_save = (!id) ? 'Simpan' : 'Simpan Perubahan';

		if (form.form()) {
			$.ajax({
				url : SITE_URL + '/' + url,
				type: type,
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            	dataType: 'JSON',
            	data: data,
        		beforeSend: function(){
        			$('#btn-save').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading ...');
        			$('#btn-save').attr('disabled', 'disabled');
            	},
            	success: function(data){
					show_notification(data.title, data.type, data.message);
					$('#modal-add-edit').modal('hide');
					on_search();
	            },
				error: function(error, sts, xhr){
					show_notification('Error', 'error', xhr);
				},
				complete:function () { 
					$('#btn-save').html(btn_save);
					$('#btn-save').removeAttr('disabled');
				}
			});
		}
	});

	$('#search').keyup(function(event){
	    if(event.keyCode == 13){
	       on_search();
	    }
	});

	$('#modal-add-edit').on('hidden.bs.modal', function () {
		  on_clear();
		});

		$('#select-all').click(function(even){
			if(this.checked) {
				// Iterate each checkbox
				$('[name="rowcheck[]"]').each(function() {
				  this.checked = true;                        
				});
			} else {
				$('[name="rowcheck[]"]').each(function() {
				  this.checked = false;                        
				});
			}
  	});

	$('#btn-confirm').click(function(){

		var id = [];
		$('input[name="rowcheck[]"]:checked').each(function(){
			id.push($(this).val());
		});

		$.ajax({

			url: SITE_URL + '/master/vocation/destroy/',
			type: 'DELETE',
			data: {
				id: id
			},
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			beforeSend: function(){
				$('#btn-confirm').attr('disabled', 'disabled');
				$('#btn-confirm').html('<i class="fa fa-spinner fa-pulse"></i> Loading ...');
			},
			success: function(data){
				show_notification(data.title, data.type, data.message);
				$('#modal-delete-confirm').modal('hide');
				on_search();
			},
			error: function(xhr, status, error) {
				show_notification('Error', 'error', error);
			},
			complete:function () { 
				$('#btn-confirm').html('Yes');
				$('#btn-confirm').removeAttr('disabled');
			}
		});

	});

});

// search

function on_search()
{
	var src = $('#search').val();
  	tbVocation.search(src).draw();
}

// clear search

function on_clear_search()
{
	$('#search').val('');
	on_search();
}

// clear

function on_clear()
{
	$('#search').val('');
	$('#form-add-edit').trigger('reset').validate().resetForm();
  	$('.form-group').removeClass('has-error');
  	$('.help-block').html('');

}

// add

function on_add()
{
	$('#modal-add-edit').modal('show');
	$('#modal-title').text('Tambah Data Kejuruan Baru');
	$('#btn-save').text('Simpan');
}

// get data

function get_data(id)
{
	var res = $.ajax({
    
	    url: SITE_URL + '/master/vocation/'+id,
	    type: 'GET',
	    dataType: 'JSON',
	    async: false,
	    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	
	});

	return res.responseJSON;
}

// edit

function on_edit()
{
	if ($('input[name="rowcheck[]"]:checked').length == 0) {
      show_notification('Informasi', 'warning', 'Silahkan Pilih Data Dahulu!');
  }
  else if ($('input[name="rowcheck[]"]:checked').length > 1) {
      show_notification('Informasi', 'warning', 'Silahkan Pilih Satu Data!');
  }
  else {

		var id = $('input[name="rowcheck[]"]:checked').val();
		var data = get_data(id);
		edit_form(data);

		$('#modal-add-edit').modal('show');
		$('#modal-title').text('Ubah Data Kejuruan');
		$('#btn-save').text('Simpan Perubahan');

  }

}

// edit form

function edit_form(data)
{
	$('[name="id"]').val(data.id);
	$('[name="code"]').val(data.code);
	$('[name="name"]').val(data.name);
	$('[name="description"]').val(data.description);
}

// delete

function on_delete()
{

	if ($('input[name="rowcheck[]"]:checked').length == 0) {
	    show_notification('Informasi', 'warning', 'Silahkan Pilih Data Dahulu!');
	} else {
	    $('#modal-delete-confirm').modal('show');
	}

}