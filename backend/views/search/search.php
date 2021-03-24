

<div>
    <h3>izlang</h3>
    <div align="center" class=''>
        <input type="text" name="search" id="search" placeholder="search" class='form-control'>
    </div>

    <ul class="list-group" id = 'result'></ul>
</div>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            $('#result').html('');
            var searchField = $('#search').val();
            var expression = new RegExp(searchField, 1);
            $.getJSON('data.json', function(data){
                $.each(data, function(key, value){
                    if(value.name.search(expression) != -1 || value.location.search(expression) != -1 )
                    {
                         
                    }
                });
            });
        });
    });
</script>