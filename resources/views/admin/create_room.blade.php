<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #f8f9fa; /* Light background color for contrast */
        }

        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        form {
            background-color: #312f2f;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            color: rgb(10, 10, 10); /* Text color for better visibility on dark background */
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: calc(100% - 160px); /* Adjust width to fit the form */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            color: #0a0a0a;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 20px; /* Adjusted margin for spacing */
            padding: 10px;
            border-radius: 5px;
            color: white;
            background-color: #28a745; /* Green background for success message */
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <form action="{{ url('/add_room') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success" id="success-message">
                        {{ session('success') }}
                    </div>
                @endif
                <div>
                    <label>Room Title</label>
                    <input type="text" name="room_title" required />
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price" required />
                </div>
                <div>
                    <label>Room Type</label>
                    <select name="room_type" required>
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div>
                    <label>Free Wifi</label>
                    <select name="wifi" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div>
                    <label>Upload Image</label>
                    <input type="file" name="image" required />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Add Room</button>
                </div>
            </form>
        </div>
    </div>
    @include('admin.footer')

    <script>
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 4000);
        }
    </script>
</body>

</html>