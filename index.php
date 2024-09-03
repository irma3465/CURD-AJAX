<!DOCTYPE html>
<html lang="en">
<head>       
	<title>Malasngoding.com - CRUD AJAX PHP MYSQLI </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<br>
	<div class="container">
		<center><h2>CRUD AJAX PHP MYSQLI - MENAMPILKAN DATA</h2></center>
		<div class="row">           
			<div class="col-5">
				<div class="card">
					<form id="form_input">
						<div class="card-body">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="kelamin" class="form-control" id="kelamin">
									<option>--pilih--</option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Kontak</label>
								<input type="number" class="form-control" id="kontak" name="kontak" placeholder="kontak">
							</div>
							<div class="form-group">
								<label >Alamat</label>
								<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>								
							</div>
 
						</div>
						<div class="card-footer">
							<button type="submit" id="tombol_simpan" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-7">
				<div id="tampil_data">
 
				</div>
			</div>
		</div>
	</div>
 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
 
<script>
	$(document).ready(function () {
		tampil_data();
	});            
 
         //fungsi tampil data
	function tampil_data() {
		$.ajax({
			url: 'data.php',
			type: 'get',
			success: function(data) {
				$('#tampil_data').html(data);
			}
		});
	}
 
	$("#tombol_simpan").click(function () {
            //validasi form
            $('#form_input').validate({
                rules: {
                    nama: {
                        required: true
                    },
                    kelamin: {
                        required: true
                    },
                    kontak: {
                        required: true
                    },
                    alamat: {
                        required: true
                    }
                },
 
                // alert(nama);
                //jika validasi sukses maka lakukan
                submitHandler: function (form) {
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php",
                        data: $('#form_input').serialize(),
                        success: function () {
                            //setelah simpan data, update data terbaru
                            tampil_data()
                        }
                    });
                    //kosongkan form nama dan jurusan
                    document.getElementById("nama").value = "";
                    document.getElementById("kelamin").value = "";
                    document.getElementById("kontak").value = "";
                    document.getElementById("alamat").value = "";
                    return false;
                }
            });
        });

        //hapus data
        $(document).on('click', '.hapus_data', function(){
	var id = $(this).attr('id');
	$.ajax({
		type: 'POST',
		url: "hapus.php",
		data: {id:id},			
		success: function(response) {				
			//setelah simpan data, update data terbaru
			tampil_data()		
		}
	});
});
</script>
 
</html><script src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 
<script>
	$(document).ready(function () {
		tampil_data();
	});            
 
         //fungsi tampil data
	function tampil_data() {
		$('#tampil_data').html('<i>Loading...</i>');
		$.ajax({
			url: 'data.php',
			type: 'get',
			success: function(data) {
				setTimeout(() => {
					$('#tampil_data').html(data);
				}, 3000)
				
			}
		});
	}
</script>
</html>