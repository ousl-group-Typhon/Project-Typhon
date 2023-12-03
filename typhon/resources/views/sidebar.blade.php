<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typhon</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
     
        

    
    <div class="navigation">
        <div class="logo">
            <img src="{{ asset('img/typhon.jpg') }}" alt="Typhon Image" alt="Logo" class="img logo rounded-circle mb-5">
            </div>
       <ul>
            
            <li class="list active">
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title"> Classes</span>
                </a>
            </li>

            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">Teachers</span>
                </a>
            </li>
            <li class="list">
                <a href="{{ route('institute.studentlist') }}">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">Students</span>
                </a>
                <li class="list">
                    <a href="{{ route('marking') }}">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title"> Assignments</span>
                    </a>
                    <li class="list">
                        <a href="{{ route('payment.index') }}">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title"> Payments</span>
                        </a>
                   


        </ul>
    </div>
    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- <script>
        //add active class in selected list item
        let list = document.querySelectorAll('.list');
        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function () {
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list'
                }
                list[i].className = 'list active'
            }
        }
    </script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let list = document.querySelectorAll('.list');

        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener('click', function () {
                // Deselect all items
                for (let j = 0; j < list.length; j++) {
                    list[j].classList.remove('active');
                }

                // Select the clicked item
                list[i].classList.add('active');

                // Store the selected item index in session storage
                sessionStorage.setItem('selectedItemIndex', i);
            });
        }

        // Check if there is a stored selected item index
        let storedIndex = sessionStorage.getItem('selectedItemIndex');
        if (storedIndex !== null) {
            // Deselect all items
            for (let j = 0; j < list.length; j++) {
                list[j].classList.remove('active');
            }

            // Select the item based on the stored index
            list[storedIndex].classList.add('active');
        }
    });
</script>
</body>

</html>