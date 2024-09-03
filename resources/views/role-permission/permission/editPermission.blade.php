@extends('adminMaster')
@section('content')
<style>
    .adminSec {
      height: 100vh;
      width: 100%;
      background: rgb(220, 219, 219);
      display: flex;
      justify-content: center; /* Center horizontally */
      align-items: center; /* Center vertically */
      margin: 0;
    }
    .section {
        background-color: white;
      padding: 20px; /* Increase padding for better spacing */
      border-radius: 6px;
      width: 500px; /* Set a fixed width for the section */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .tag-section {
      margin-top: 30px;
      margin-bottom: 30px;
      gap: 10px;
    }
    .formInput {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .button-div{
        display: flex;
        justify-content: center;
    }
    .updateButton {
        margin-top: 23px;
      width: 90px;
      font-family: "Montserrat", sans-serif;
      background: linear-gradient(to top, #3bb890, #114070);
      color: white !important;
      border: none;
      padding: 5px;
      font-weight: 600;
      border-radius: 4px;
      cursor: pointer;
      font-family: "Montserrat", sans-serif;
      transition: background 0.3s ease;
    }

    .updateButton:hover {
      background: linear-gradient(to bottom, #3bb890, #114070);
      opacity: 0.9;
      color: white !important;
    }
  </style>


    <div class="adminSec flex-grow-1 p-3">
      <!-- Tag and button section  -->
      <section class="section">
        <h1>Update Permission</h1>
        <form class="tag-section" method="POST" action="/permission-update/{{$permission->id}}">
            @csrf
            @method('PUT')
          <span class="form-group">
            <label for="name">Name:</label>
            <input
              type="text"
              class="formInput"
              id="name"
              name="name"
              value="{{$permission->name}}"
              placeholder="Enter Name"
              required
            />
          </span>
          <span class="button-div">
            <button class="updateButton">Update</button>
          </span>
        </form>
      </section>
    </div>
@endsection
