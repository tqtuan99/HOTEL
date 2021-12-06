<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Date Range</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
   <script src="../../../../../hotel/assets/components/home/calendar/calendar.js"></script>
   <link rel="stylesheet" href="./calendar.css">
   <link rel="stylesheet" href="../../../../output.css">
</head>

<body>
   <div class="search search__container">
      <div class="flex flex-wrap justify-center items-center h-full">
         <div class="search__container--item ">
            <div>
               <label for="from">CHECK IN</label>
            </div>
            <input class="rounded-2xl text-lg" type="text" id="from" name="from" placeholder="mm-dd-yyyy">
         </div>
         <div class="search__container--item">
            <div>
               <label for="to">CHECK OUT</label>
            </div>
            <input class="rounded-2xl text-lg" type="text" id="to" name="to" placeholder="mm-dd-yyyy">
         </div>
         <div class="search__container--item">
            <div>
               <span>ADULTS</span>
            </div>
            <select class="w-full rounded-2xl text-lg" name="" id="">
               <option>01</option>
               <option>02</option>
               <option>03</option>
               <option>04</option>
               <option>05</option>
               <option>07</option>
               <option>08</option>
               <option>09</option>
            </select>
         </div>
         <div class="search__container--item">
            <div>
               <span>CHILDREN</span>
            </div>
            <select class="w-full rounded-2xl text-lg" name="" id="">
               <option>0</option>
               <option>01</option>
               <option>02</option>
               <option>03</option>
               <option>04</option>
               <option>05</option>
            </select>
         </div>
         <div class="search__container--btn ani">
            <a class="no-underline text-white animate-pulse" href="#">SEARCH</a>
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div>
</body>

</html>