@extends('layout')

@section('content')

<div class="container-fluid py-4">
    <h1 class="mr-3">Pemesanan Page</h1>
    <div class="row g-2">
        <div class="col-md-8 grid-margin stretch-card ">
            <div class="card tale-bg p-4 ml-4">
            @include('pemesanan.menu')
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card tale-bg py-3 px-3">
            @include('pemesanan.pemesanan')
            </div>
        </div>
    </div>
    @include('footer')

    
{{-- @include('kategori.form') --}}
@endsection
@push('script')
<script>


    $(function(){
        //inisialisasi
        const orderedList = [];
        let total = 0

        const sum = () => {
            return orderedList.reduce((acccumulator,object)=> {
                return acccumulator + (object.harga * object.qty);
            },0)
        };

        const changeQty = (el,inc) => {
            //ubah di array
            const id = $(el).closest('.li')[0].dataset.id;
            const index = orderedList.findIndex(list => list.id == id)
            console.log(orderedList)
            console.log(index)
            orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc 

            //ubah qty dan ubah subtotal
            const txt_subtotal = $(el).closest('.li').find('.subtotal')[0];
            const txt_qty = $(el).closest('.li').find('.qty-item')[0];
            txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
            txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

           $('#total').html(sum());
        }

        // console.log('halo');

        $('.ordered-list').on('click','.btn-dec',function(){changeQty(this,-1)})
        $('.ordered-list').on('click','.btn-inc',function(){
            // console.log(orderedList)
            changeQty(this,1);
        })

        $('.ordered-list').on('click','.remove-item',function(){
            const item = $(this).closest('.li')[0];
            let index = orderedList.findIndex(list => list.id = parseInt(item.dataset.id))
            orderedList.splice(index,1)
            $(item).remove();
            $('#total').html(sum)
        })

        $('#btn-bayar').on('click',function(){
            $.ajax({
                url: "{{route('transaksi.store')}}",
                method: "POST",

                data: {
                    "_token": "{{csrf_token()}}",
                    orderedList:orderedList,
                    total:sum()
                },
                success:function(data){
                    console.log(data)
                }
            })


        })


        $(".menu-item").click(function(){
            //ambil data
            // const menu_clicked = $(this).text();
            const nama_menu = $(this).data('nama_menu');
            const data = $(this)[0].dataset;
            const harga = parseFloat(data.harga);
            const id = parseInt(data.id)    
            
            if(orderedList.every(list => list.id !== id)){
                let dataN = {'id':id,'menu':nama_menu,'harga':harga, 'qty': 1}
                // console.log(orderedList)
                let listOrder = `<div class="card p-3 pb-0 rounded mb-3 li" data-id="${id}" style="border-left: 10px solid #d51c1c;">
                                    <div class="d-flex justify-content-between">
                                        <h4>${nama_menu}</h4>
                                        <input class="qty-item" type="number" value="1" style="width:40px;height: 25px;border: none; outline: none;" readonly/>
                                        <div class="d-flex">
                                            <button class="btn btn-light btn-rounded btn-icon-only text-lg p-0 btn-dec" style="width: 25px; height: 25px;">-</button>
                                            <button class="btn btn-warning btn-rounded btn-icon-only text-lg p-0 ms-2 btn-inc" style="width: 25px; height: 25px;">+</button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Rp. <span class="subtotal">${harga *1}</span></p>
                                        <button class="btn btn-primary btn-rounded text-lg ps-3 py-1 ms-2 remove-item"><i class="material-icons text-white">delete</i> hapus</button>
                                    </div>
                                </div>`;
                orderedList.push(dataN);
                $('.ordered-list').append(listOrder)
            }
            $('#total').html(sum())
            console.log ('hii')
            
})
    });
</script>
@endpush