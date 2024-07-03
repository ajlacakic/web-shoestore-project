var token = localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user")).token : null;
$.ajax({
  url: 'php/load_profile.php',  
  type: 'GET',
  headers: {
    'Authorization':  token  
  },
  success: function(data) {
    data = JSON.parse(data)
    console.log(data.status)
    if (data.status === 'success') { 
        $('#user-name').text(data.user.username || 'N/A');
        $('#user-email').text(data.user.email || 'N/A');
    } else {
        alert(data.error || 'Error fetching profile data');
    }
  },
  error: function(xhr, status, error) {
    console.error('Error:', xhr.responseText);
  }
});
