<!DOCTYPE html>
<html lang="en">

<head>
    <title>Msifa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/near-api-js/dist/near-api-js.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/near-api-js@2.1.4/dist/near-api-js.min.js"></script> -->


</head>

<body>

    <?php include('navbar.php') ?>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Donate</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Donations
                    </h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section bg-light">


        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Donation Information</h2>
                </div>


            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <div class="col-md-12">
                        <p><span>Beneficiary Account:</span>
                            <span id="beneficiary-name"></span>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p><span>Total Donation:</span> xxx</p>
                    </div>
                    <div class="col-md-12">
                        <p><span>Total Near Donations:</span> xxx </p>
                    </div>
                    <div class="col-md-12">

                        <p><span>Account <span id="account-name"></span> </span> <a id="sign-in-button" style="opacity: 0; color: #f86f2d" href="#" class="">Sign in </a>
                            <a id="sign-out-button" style="opacity: 0; color: #f86f2d" class="">Sign out </a>
                        </p>
                    </div>

                    <h4 class="mb-4">Donate? You account has </h4>
                    <span id="balance"></span>
                    <form action="contact.html#">
                        <div class="form-group">
                            <input type="number" class="form-control" id="donate-amount" placeholder="10 (Near)">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send Near" id="donate-btn" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6" id="donations">
                    <h4> Latest Donations </h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Total Donated Ⓝ</th>
                            </tr>
                        </thead>
                        <tbody id="donations-table"> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <?php include('footer.php') ?>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>



    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>

    <script src="js/main.js"></script>


    <script>
        const nearConfig = {
            networkId: 'testnet', // Testnet network ID
            nodeUrl: 'https://rpc.testnet.near.org', // Testnet RPC endpoint
            walletUrl: 'https://wallet.testnet.near.org', // Testnet wallet URL
            helperUrl: 'https://helper.testnet.near.org', // Testnet helper URL
            explorerUrl: 'https://explorer.testnet.near.org', // Testnet explorer URL
        };

        const contractId = 'dev-1687254547876-16039193712100';





        window.onload = async () => {

            console.log("onload  .....")
            let loginButton = document.getElementById('sign-in-button');
            let logoutButton = document.getElementById('sign-out-button');
            let accountName = document.getElementById('account-name');
            let beneficiaryName = document.getElementById('beneficiary-name');
            let donatBtn = document.getElementById('donate-btn');
            let donateAmount = document.getElementById('donate-amount');

            const near = await nearApi.connect(nearConfig);
            const walletConnection = new nearApi.WalletConnection(near, contractId);



            if (walletConnection.isSignedIn()) {

                // show logout  button
                logoutButton.style.opacity = 1;
                donatBtn.disabled = false;

                // set you account name
                const accountId = walletConnection.getAccountId();
                accountName.innerText = accountId;


                const account = await near.account(accountId);

                const accountState = await account.state();
                const balance = nearApi.utils.format.formatNearAmount(accountState.amount);

                document.getElementById('balance').innerText = `Wallet Balance: ${balance} NEAR`;



                const contract = new nearApi.Contract(account, contractId, {
                    viewMethods: ["get_beneficiary", "get_donations", "number_of_donors"],
                    changeMethods: ["donate"],
                    sender: account
                });

                const result = await contract.get_beneficiary()

                beneficiaryName.innerText = result;

                // donations
                document.getElementById('donations-table').innerHTML = 'Loading ...'
                const number_of_donors = await contract.number_of_donors()

                const min = number_of_donors > 10 ? number_of_donors - 9 : 0

                let donations = await contract.get_donations({
                    from_index: min.toString(),
                    limit: number_of_donors
                })

                console.log("get_donations Result:", result);

                donations.forEach(elem => {
                    elem.total_amount =nearApi.utils.format.formatNearAmount(elem.total_amount);
                })


                // Load last 10 donations
                // let donations = await contract.latestDonations()

                document.getElementById('donations-table').innerHTML = ''

                donations.forEach(elem => {
                    let tr = document.createElement('tr')
                    tr.innerHTML = `
                        <tr>
                            <th scope="row">${elem.account_id}</th>
                            <td>${elem.total_amount}</td>
                        </tr>
                        `
                    document.getElementById('donations-table').appendChild(tr)
                })


                donatBtn.onclick = async (e) => {
                    e.preventDefault();
                    let amount=1;
                    if (donateAmount.value != undefined && donateAmount.value.length >0  ){
                        amount = parseInt(donateAmount.value)
                    }
                    let results = await contract.donate({
                        deposit: amount,
                    })
                }


            } else {

                document.getElementById('donations-table').innerHTML = 'Please sign in first '
                loginButton.style.opacity = 1;
                donatBtn.disabled = true;


            }

            loginButton.onclick = (e) => {
                // Open the NEAR wallet login page
                walletConnection.requestSignIn(contractId);
                window.location.reload();
            }

            logoutButton.onclick = (e) => {
                // Open the NEAR wallet login page
                walletConnection.requestSignOut(contractId);
            }



        }
    </script>


</body>

</html>