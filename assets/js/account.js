function editAccount() {
    document.querySelector('.account-content').style.display = 'none';
    document.querySelector('.edit-form').style.display = 'block';
  
    // Populate fields with current data
    document.getElementById('edit-name').value = document.getElementById('client-name').innerText;
    document.getElementById('edit-email').value = document.getElementById('client-email').innerText;
  }
  
  document.getElementById('edit-form').addEventListener('submit', function(e) {
    e.preventDefault();
  
    // Update displayed data
    document.getElementById('client-name').innerText = document.getElementById('edit-name').value;
    document.getElementById('client-email').innerText = document.getElementById('edit-email').value;
  
    // Switch back to view mode
    document.querySelector('.account-content').style.display = 'block';
    document.querySelector('.edit-form').style.display = 'none';
  });
  