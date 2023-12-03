<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar 01</title>
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
                <a href="#">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title"> Students</span>
                </a>
           


        </ul>
    </div>
    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
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
    </script>

</body>

</html>