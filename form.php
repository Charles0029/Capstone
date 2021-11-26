<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/formcss.css">
    <title>Form</title>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <div class="card custom-container">
                <div class="text-center">
                    <h2>(ORDER FORM) - Gfoxx Spirulina</h2>
                    <p>Please fill up the form para ma-process po namin ang order niyo.  🛒</p>
                    <p>Ito po ang mga number po ng aming Call Supports . Maari po silang tawagan sa oras ng kanilang duty sa umaga o sa hapon. 😃</p>
                    <p> Ms. Jona - 09754606032 (7am-4pm) <br>
                        Ms. Meca - 097546059921 (2pm-10pm)</p>
                </div>
                
                    <form action="" method="POST">
                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            <label for="fbname">FB Name</label>
                            <input type="text" class="form-control" name="fbname" placeholder="Enter FB Name" required>
                            <label for="concern">Ano po and kanilang health concern?</label>
                            <input type="text" class="form-control" name="concern" placeholder="" required>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="question">Matagal na po ba or bago pa lang ang kanilang health concern?</label>
                            <select name="question" class="form-control">
                                <option>Matagal na</option>
                                <option>Bago pa lang</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="number">Phone Number</label>
                            <input type="text" class="form-control" name="number" placeholder="Enter Phone Number" required>
                            <label for="number">Extra Phone Number</label>
                            <input type="text" class="form-control" name="extranumber" placeholder="Enter Extra Phone Number" required>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="address">Unit No, Street, Subdivision/Village  </label>
                            <p> Maaring pakilagay ng pagkasunod sunod upang mabilis ang iyong delivery. (Example: B1 L27 Phase 1 Tulip Street Celina Royale Subdivision)</p>
                           
                            <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="landmark">Landmark</label>
                            <p>Ang Landmark ang pinaka-importante. Ito ay ang palatandaan kung saan malapit ang kanilang bahay. (Example: "Tapat ng shell gasolinahan")</p>
                            <input type="text" class="form-control" name="landmark" placeholder="Enter Landmark" required>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" name="province" placeholder="Enter Province" required>
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter City" required>
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" name="barangay" placeholder="Enter Barangay" required>
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="">How many bottles po?</label>
                            <p>Avail na po sila ng 2-3 bottles promos para masulit ang free shipping po natin. 1075 pesos lang po pumapatak kada isang bottle kapag 2 bottles promo save up to 801 pesos kapag 2 bottles promo po pero kapag 3 bottles promo naman po pumapatak 1000 pesos each bottle lang po save up to 1201 pesos kapag 3 bottles promo po ang inavail nila.</p>
                            <select name="bottle" id="" class="form-control">
                                <option value="">A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.</option>
                                <option value="">B.) BOTTLES: P1,900 ONLY! FREE Shipping (SAVE P1,220) - Good for 1 month + FREE one Alcohol with Spray bottle.</option>
                                <option value="">C.) BOTTLES: P2,700 ONLY! FREE Shipping (SAVE P1,770) - Good for 1 month + FREE one Alcohol with Spray bottle.</option>
                            </select> 
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="">Best time to receive a call?</label>
                            <p>May tatawag po from our customer service to confirm your order. Eto po number nila - 09656526461. 🙂 What time po kayo available within the day? </p>
                            <select name="bottle" id="" class="form-control">
                                <option value="">Morning (8am-11am)</option>
                                <option value="">Afternoon (1pm-5pm)</option>
                                <option value="">Evening (6pm-10pm)</option>
                            </select> 
                        </div>
                        <br>
                        <div class="form-group col">
                            <label for="">MODE OF PAYMENT</label>
                            <select name="bottle" id="" class="form-control">
                                <option value="">CASH ON DELIVERY</option>
                                <option value="">GCASH (09656526461)</option>
                                <option value="">BPI (5056-614-747)</option>
                            </select> 
                        </div>
                        <br>
                        
                        <div class="form-group col">
                            <label for="">Note for delivery</label>
                            <p>Optional but highly suggested kung wala po lagi sila sa bahay at nasa work madalas. EXAMPLE: ("Deliver within weekdays around 1-5pm")</p>
                            <input type="text" class="form-control" name="noteforDelivery">
                        </div>
                        <br>
                        
                        <div class="text-center">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
            </div>
        </div>
    </div>
    
    
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>