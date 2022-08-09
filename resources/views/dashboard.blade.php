<html>
    <head>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div class="w-100  bg-primary d-flex justify-content-center align-items-center">
            <span class="text-white" style='font-size:75px;'>Dashboard</span>
        </div>
        <div class='container m-auto  p-2' style='width:100%'>
            <div class="row w-100">
                <div style='border-radius:30px;' class='col-8 border border-gray'>
                    <h1 align='center'>Users</h1>
                    <table class='table  mt-3'>
                        <tr>
                            <th class='text-center' colspan="3">Top Buyers</th>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Total orders</th>
                        </tr>
                        @foreach ($users as $user )
                            @if ($user['analysis']['totalOrders']>0)    
                                <tr>
                                    <td>{{ $user['username'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['analysis']['totalOrders'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <div class='text-center'>
                        <h2>Total number of users: </h2>
                        <span class='h1'>{{ count($users) }}</span>
                    </div>
                </div>
                <div  class="col-4 ml-2">
                    <div style='border-radius:30px;' class='w-100 h-100 p-2 border border-gray'>
                        <h1 align='center'>Categories sales</h1>
                        <div id='donutchart' class='w-100 h-100'>
        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row w-100 mt-3">
                <h1 align='center'>Latest Featured Products</h1>
                <div class='col-12 d-flex gap-4 justify-content-center p-4 border border-gray' style='border-radius:30px;'>
                    @foreach ($products as $product)
                        <div class="card" style='width:30%'>
                            <div class="card-header">{{ $product['category']['category_name'] }}</div>
                            <div class="card-body">
                                <h5 class='card-title'>{{ $product['product_name'] }}</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus rerum temporibus facilis? Vitae placeat necessitatibus quisquam quo facilis laboriosam soluta.</p>
                                <h5 class='card-price'>{{ $product['product_price'] }}$</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="w-100  bg-primary d-flex justify-content-center align-items-center" style='height:10%'>
    </body>
    <script>
    axios.get('api/categoriesAnalysis').then((response)=>{
            var catArray = response.data;
            catArray[0]= ['Cart','order'];
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable(response.data)
                var options = {
                    pieHole: 0.6,
                };
                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
    })
        
    </script>
</html>