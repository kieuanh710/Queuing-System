<!-- Bootstrap core JavaScript-->
<script src="/template/admin/vendor/jquery/jquery.min.js"></script>
<script src="/template/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

<!-- Core plugin JavaScript-->
<script src="/template/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/template/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/template/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/template/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="/template/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/template/admin/js/demo/datatables-demo.js"></script>

<script src="/assets/js/main.js"></script>
<script src="/assets/js/chart.js"></script>
<script src="/assets/js/datepicker.js"></script>

<script src="/assets/datapicker/js/jquery.min.js"></script>
<script src="/assets/datapicker/js/popper.js"></script>
<script src="/assets/datapicker/js/bootstrap.min.js"></script>
<script src="/assets/datapicker/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- search --}}
<script type="text/javascript">
    $('#search').on('keyup', function(){
        var searchFilter = $(this).val();
        $.ajax({
          method:'post',
          url:'{{route('search')}}',
          dataType: 'json',
          data:{
            '_token' : '{{csrf_token()}}',
            searchFilter:searchFilter
        },
            success:function(data){
                // console.log(data);
                var table = '';
                $('tbody').html('');
                $.each(data, function(index, value){
                    table = 
                    '<tr>\
                        <td>'+value.username+'</td>\
                        <td>'+value.method+'</td>\
                        <td>'+value.ip+'</td>\
                        <td>'+value.subject+'</td>\
                    </tr>';
                    $('tbody').append(table)
                    // console.log(table);
                })
            }
        });
    });
</script>

{{-- <script>
    $(document).ready(function(){
        fectchFilter();
        function fectchFilter(){
            $.ajax({
                type: "GET",
                url:"{{route('')}}",
                dataType:"json"
                success:function(response){
                    console.log(response);
                }
            })
        }
    });
<script> --}}




    
