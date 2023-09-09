<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Megacanal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css">
</head>
<body>
  <nav class="navbar navbar-light border">
    <div class="container-fluid justify-content-center">
      <a class="navbar-brand" href="{{ url("/") }}">
        PRODUCT LIST
      </a>
    </div>
  </nav>
    <div class="container border border-1 p-5">
            <div class="row justify-content-center">
                <div class="col">
                    <table id="tabletest" class="table table-responsive table-striped table-bordered rounded-3">
                        <thead class="table-success">
                          <th class="d-none">id</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Brand</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th class="text-center">Action</th>
                        </thead>
                      </table>
                </div>
            </div>
    </div>

    <div id="modalDetail" class="modal" aria-hidden="true" aria-labelledby="modalDetailLabel" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="titlemodal" class="modal-title">Modal 1</h5>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-6">
                  <div class="slider-image">

                  </div>
                </div>
                <div class="col-6">
                  <table class="table">
                        <tbody>
                          <tr>
                            <td colspan="2"><div id="my-rating"></div></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>Price</td>
                            <td id="price"></td>
                          </tr>
                          <tr>
                            <td>Brand</td>
                            <td id="brand"></td>
                          </tr>
                          <tr>
                            <td>Category</td>
                            <td id="category"></td>
                          </tr>
                          <tr>
                            <td>Stock</td>
                            <td id="stock"></td>
                          </tr>
                          <tr>
                            <td>Description</td>
                            <td id="description"></td>
                          </tr>
                        </tbody>
                  </table>
                 
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div id="modalOrder" class="modal" aria-hidden="true" aria-labelledby="modalOrderLabel" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Invoice</h5>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post" action="{{url('storedata')}}" id="storeform">
            @csrf
          <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="kodepesanan" class="form-label">Kode Pesanan</label>
                      <input name="kode_pesanan" type="text" class="form-control" id="kodepesanan" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="tanggalpesanan" class="form-label">Tanggal Pesanan</label>
                      <input name="tanggal_pesanan" type="text" class="form-control" id="tanggalpesanan" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="namasupplier" class="form-label">Nama Supplier</label>
                      <input name="nama_supplier" type="text" class="form-control" id="namasupplier" required>
                    </div>
                    <div class="mb-3">
                      <label for="namaproduk" class="form-label">Nama Produk</label>
                      <input name="nama_produk"  type="text" class="form-control" id="namaproduk" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="total" class="form-label">Total</label>
                      <input name="total" type="number" class="form-control" id="total" readonly>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Process</button>
          </div>
        </form>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/dist/jquery.star-rating-svg.min.js"></script>
    
   
    <script>
        $(document).ready(function() {
         var status='{{ session("data") ?? "" }}';
          if(status){
            alertMessage(status);
          }

          var table=   $('#tabletest').DataTable( {
            ajax: {
                url: '/getalldata',
                dataSrc: 'products'
            },
            columns: [
              { data: 'id'},
                { data: 'thumbnail',
                "render": function(data, type, row, meta){
                        if(type == 'display'){
                          data = '<img class="img-thumbnail" src="'+data+'" alt="Cover">'
                        }
                        return data;
                  }
                },
                { data: 'title'},
                { data: 'category'},
                { data: 'brand' },
                { data: 'price' },
                { data: 'stock' },
                { data: 'action' },
                
               
            ],
              columnDefs: [
              { "visible": false, "targets": 0,"orderable":false },
              { "visible": true, "targets": 1,"orderable":false },
              { "visible": true, "targets": 2,"orderable":false },
              { "visible": true, "targets": 3,"orderable":true },
              { "visible": true, "targets": 4,"orderable":true },
              { "visible": true, "targets": 5,"orderable":false },
              { "visible": true, "targets": 6,"orderable":false },
              { "visible": true, "targets": 7,"orderable":false, defaultContent: '<div class="text-center"><button id="detail" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail">Detail</button>&nbsp;&nbsp;&nbsp;<button id="order" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalOrder">Order</button></div>'}
            ]
          } );

          table.on('click', '#detail', function (e) {
              let data = table.row(e.target.closest('tr')).data();
              
              $("#titlemodal").text("Product : "+data["title"]);
              $("#price").text(": "+data["price"]);
              $("#brand").text(": "+data["brand"]);
              $("#category").text(": "+data["category"]);
              $("#stock").text(": "+data["stock"]);
              $("#description").text(": "+data["description"]);
              $.each(data["images"],function (index, value) {
                  $(".slider-image").append('<div><img class="d-block w-100" src="'+value+'" alt="" width="200" height="200"></div>')
              });
              $('.slider-image').slick({
                infinite: true,
                slidesToShow: 1,
                arrows: false,
                dots:true,
                fade: true,
                autoplaySpeed: 3000,
                zIndex:999
               
              });
              $("#my-rating").starRating({
                starSize:25,
                initialRating: data["rating"],
                readOnly:true
                
              });
              
          });

          table.on('click', '#order', function (e) {
              let data = table.row(e.target.closest('tr')).data();
              var getKode = "ODR-"+generateString(15).toUpperCase();
              var today = new Date();
              var date = today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today.getDate();

              $("#kodepesanan").val(getKode);  
              $("#namaproduk").val(data["title"]);  
              $("#total").val(data["price"]);  
              $('#tanggalpesanan').val(date);
              
          });

          $('#modalDetail').on('hidden.bs.modal', function (e) {
            $('.slider-image').slick("unslick");
            $(".slider-image").html("");
           
          })
        })    

       

        function generateString(length) {
            var characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let result = '';
            var charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        function alertMessage(status){
          if(status){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Data Inserted Successfully !',
                showConfirmButton: true,
                timer: 2000
              })
          }else{
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'failed Insert data !',
                showConfirmButton: true,
                timer: 2000
              })
          }
        }
    </script>
</body>
</html>