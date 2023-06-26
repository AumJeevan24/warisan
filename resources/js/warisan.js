// GET request to fetch all warisans
function fetchWarisans() {
    fetch('/warisans')
      .then((response) => response.json())
      .then((data) => {
        // Process the fetched warisans data
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
  
  // GET request to fetch a specific warisan by ID
  function fetchWarisanById(id) {
    fetch(`/warisans/${id}`)
      .then((response) => response.json())
      .then((data) => {
        // Process the fetched warisan data
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
  
  // POST request to create a new warisan
  function createWarisan(data) {
    fetch('/warisans', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        // Process the created warisan response
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
  
  // PUT request to update an existing warisan
  function updateWarisan(id, data) {
    fetch(`/warisans/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((data) => {
        // Process the updated warisan response
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
  
  // DELETE request to delete an existing warisan
  function deleteWarisan(id) {
    fetch(`/warisans/${id}`, {
      method: 'DELETE',
    })
      .then((response) => response.json())
      .then((data) => {
        // Process the deleted warisan response
        console.log(data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
  
  // Example usage:
  // Fetch all warisans
  fetchWarisans();
  
  // Fetch a specific warisan by ID (replace '1' with the desired ID)
  fetchWarisanById(1);
  
  // Create a new warisan
  const newWarisan = {
    kategori: 'Category',
    nama: 'New Warisan',
    desc: 'Description',
    date: '2023-06-26',
    gambar: 'warisan.jpg',
  };
  createWarisan(newWarisan);
  
  // Update an existing warisan (replace '1' with the desired ID)
  const updatedWarisan = {
    kategori: 'Updated Category',
    nama: 'Updated Warisan',
    desc: 'Updated Description',
    date: '2023-06-26',
    gambar: 'updated_warisan.jpg',
  };
  updateWarisan(1, updatedWarisan);
  
  // Delete an existing warisan (replace '1' with the desired ID)
  deleteWarisan(1);
  