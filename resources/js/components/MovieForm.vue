<template>
  <form id="movieForm" @submit.prevent="saveMovie">
    <div class="form-group mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" />
    </div>

    <div class="form-group mb-3"> 
      <label for="description" class="form-label">Description</label>
      <textarea ="description" name="description" class="form-control" />
    </div>

    </div class="form-group mb-3">
      <label for="poster" class="form-label">Poster</label>
      <input type="file" name="poster" class="form-control" accept="image/*" />

    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</template>

<script setup>
  
  const saveMovie = () => {
    let movieForm = document.getElementById('movieForm');
    let formData = new FormData(movieForm);
    
    fetch("/api/v1/movies", {
      method: 'POST',
      body: formData,
      headers: {
        'Accept': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      // Handle success response
      console.log(data);
    })
    .catch(error => {
      // Handle error
      console.error(error);
    });
  };
</script>
