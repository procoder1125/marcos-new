<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


<p>salom</p>

<button id = 'send-api'>meni bos</button>

<script>
$('#send-api').on('click', function(){
    $.ajax({
        url: 'http://jadval/api/users',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            console.log(data);
        }
    })
});
</script>