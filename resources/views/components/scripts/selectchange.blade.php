<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
        });

        $(function(){
            $('#province').on('change', function(){
                let province_id = $('#province').val()
                $.ajax({
                    type: 'POST',
                    url: "/getcities",
                    data: {province_id:province_id},
                    cache: false,

                    success: function(msg){
                        $('#cities').html(msg)
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })
        
        $(function(){
            $('#cities').on('change', function(){
                let city_id = $('#cities').val()
                $.ajax({
                    type: 'POST',
                    url: "/getdistricts",
                    data: {city_id:city_id},
                    cache: false,

                    success: function(msg){
                        $('#districts').html(msg)             
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })
        
        $(function(){
            $('#districts').on('change', function(){
                let district_id = $('#districts').val()
                $.ajax({
                    type: 'POST',
                    url: "/getsubdistricts",
                    data: {district_id:district_id},
                    cache: false,

                    success: function(msg){
                        $('#sub_districts').html(msg)
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })

        $(function(){
            $('#brands').on('change', function(){
                let brand_id = $('#brands').val()
                $.ajax({
                    type: 'POST',
                    url: "/getmodel",
                    data: {brand_id:brand_id},
                    cache: false,

                    success: function(msg){
                        $('#model').html(msg)
                    },
                    error: function(data){
                        console.log('error:',data)
                    },
                })
            })
        })
    })
    

</script>