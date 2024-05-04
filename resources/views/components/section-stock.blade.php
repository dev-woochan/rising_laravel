<main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- 주식 카드 컴포넌트 -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">코스피 🇰🇷</h2>
                <p>
                    <span>현재 지수:</span> <span id="KOSPIclpr" class="text-gray-600">--</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span id="KOSPIvs" class="text-gray-600">--</span>
                </p>
                <p>
                    <span>등락률:</span> <span id="KOSPIfltRt" class="text-gray-600">--</span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/main/KOSPI.png?sidcode=1708490701986"
                    class="main_chart_kospi" alt="실시간 코스피 차트">
            </div>
        </div>
        <!-- 코스닥 -->

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">코스닥 🇰🇷</h2>
                <p>
                    <span>현재 지수:</span> <span id="KOSDAQclpr" class="text-gray-600">--</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span id="KOSDAQvs" class="text-gray-600">--</span>
                </p>
                <p>
                    <span>등락률:</span> <span id="KOSDAQfltRt" class="text-gray-600">--</span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/main/KOSDAQ.png?sidcode=1708490701988"
                    class="main_chart_kosdaq" alt="실시간 코스닥 차트">
            </div>
        </div>
        <!-- 코스닥 -->
        <!-- 나스닥 -->

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">나스닥 🇺🇸</h2>
                <p>
                    <span>현재 지수:</span> <span id="NASDAQclpr" class="text-gray-600">15,927.90</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span id="NASDAQvs" class="text-gray-600">+316.14</span>
                </p>
                <p>
                    <span>등락률:</span> <span id="NASDAQfltRt" class="text-gray-600">+2.03%</span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/NAS@IXIC.png?1708491621832"
                    class="main_chart_nasdaq" alt="실시간 나스닥 차트">
            </div>
        </div>
        <!-- 나스닥 -->
        <!-- 나스닥 -->

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">S&P500 🇺🇸</h2>
                <p>
                    <span>현재 지수:</span> <span id="S&Pclpr" class="text-gray-600">5,099.96</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span id="S&Pvs" class="text-gray-600">+51.54</span>
                </p>
                <p>
                    <span>등락률:</span> <span id="S&PfltRt" class="text-gray-600">+1.02%</span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/SPI@SPX.png?1708491621832"
                    class="main_chart_S&P500" alt="실시간 S&P500 차트">
            </div>
        </div>
        <!-- 나스닥 -->
        <!-- S&P -->

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">독일 🇩🇪</h2>
                <p>
                    <span>현재 지수:</span> <span class="text-blue-600">17,932.17</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span class="text-blue-500">-186.15</span>
                </p>
                <p>
                    <span>등락률:</span> <span class="text-blue-500">-1.02%</span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/XTR@DAX30.png?1714579552755"
                    class="main_chart_S&P500" alt="실시간 독일 차트">
            </div>
        </div>
        <!-- S&P -->
        <!-- 상해 -->

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800">상해종합 🇨🇳</h2>
                <p>
                    <span>현재 지수:</span> <span class="text-blue-600">3,104.83</span>
                </p>
                <p>
                    <span>전일 대비:</span> <span class="text-blue-600">-8.218</span>
                </p>
                <p>
                    <span>등락률:</span> <span class="text-blue-600">-0.26%
                    </span>
                </p>
                <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/SHS@000001.png?1714579192633"
                    class="main_chart_S&P500" alt="실시간 S&P500 차트">
            </div>
        </div>
        <!-- 상해 -->

    </div>

    <script>


        let key = "wJw%2BTdV9J5yrB4rM0HYG0YlhLtTtos5EoUBuqJwba%2FwmmwufGmUkKyoG4rS%2BQAYbycOaRarMU2fEckCLIH4wCA%3D%3D";
        let url = `https://apis.data.go.kr/1160100/service/GetMarketIndexInfoService/getStockMarketIndex?serviceKey=${key}&numOfRows=1&pageNo=1&resultType=json&idxNm=코스피
`;
        let KOSDAQclprElement = document.getElementById('KOSDAQclpr');
        let KOSDAQvsElement = document.getElementById('KOSDAQvs');
        let KOSDAQfltRtElement = document.getElementById('KOSDAQfltRt');
        let KOSPIclprElement = document.getElementById('KOSPIclpr');
        let KOSPIvsElement = document.getElementById('KOSPIvs');
        let KOSPIfltRtElement = document.getElementById('KOSPIfltRt');

        let NASDAQclpr = document.getElementById('NASDAQclpr');
        let NASDAQvs = document.getElementById('NASDAQvs');
        let NASDAQfltRt = document.getElementById('NASDAQfltRt');


        let SNPclpr = document.getElementById('S&Pclpr');
        let SNPvs = document.getElementById('S&Pvs');
        let SNPfltRt = document.getElementById('S&PfltRt');
        //한국 정보포탈 제공 api 
        //kosdaq 및 kospi 지수 정보를 실시간으로 받아와서 처리한다.
        //json으로 받아와서 종가,등락률,등락정보를 반영함 
        fetch(url)
            .then(response => response.json())
            .then(
                data => {
                    console.log(data);
                    let KOSPIclpr = data.response.body.items.item[0]['clpr'];
                    let KOSPIvs = data.response.body.items.item[0]['vs'];
                    let KOSPIfltRt = data.response.body.items.item[0]['fltRt'];

                    if (KOSPIvs > 0) {
                        KOSPIclprElement.style.color = "red";
                        KOSPIvsElement.style.color = "red";
                        KOSPIfltRtElement.style.color = "red";
                        KOSPIclprElement.textContent = KOSPIclpr;
                        KOSPIvsElement.textContent = KOSPIvs;
                        KOSPIfltRtElement.textContent = KOSPIfltRt + "%";
                    } else {
                        KOSPIclprElement.style.color = "blue";
                        KOSPIvsElement.style.color = "blue";
                        KOSPIfltRtElement.style.color = "blue";
                        KOSPIclprElement.textContent = KOSPIclpr;
                        KOSPIvsElement.textContent = KOSPIvs;
                        KOSPIfltRtElement.textContent = KOSPIfltRt + "%";
                    }

                }
            ).catch(error => {
                console.error("Error발생 :", error);
                throw error;
            })


        let urlKOSDAQ = `https://apis.data.go.kr/1160100/service/GetMarketIndexInfoService/getStockMarketIndex?serviceKey=${key}&numOfRows=1&pageNo=1&resultType=json&idxNm=코스닥
`;
        fetch(urlKOSDAQ)
            .then(response => response.json())
            .then(
                data => {
                    console.log(data);
                    let KOSDAQclpr = data.response.body.items.item[0]['clpr'];
                    let KOSDAQvs = data.response.body.items.item[0]['vs'];
                    let KOSDAQfltRt = data.response.body.items.item[0]['fltRt'];


                    console.log(KOSDAQclpr);
                    console.log(KOSDAQvsElement);

                    if (KOSDAQvs > 0) {
                        KOSDAQclprElement.style.color = "red";
                        KOSDAQvsElement.style.color = "red";
                        KOSDAQfltRtElement.style.color = "red";
                        KOSDAQclprElement.textContent = KOSDAQclpr;
                        KOSDAQvsElement.textContent = KOSDAQvs;
                        KOSDAQfltRtElement.textContent = KOSDAQfltRt + "%";
                    } else {
                        KOSDAQclprElement.style.color = "blue";
                        KOSDAQvsElement.style.color = "blue";
                        KOSDAQfltRtElement.style.color = "blue";
                        KOSDAQclprElement.textContent = KOSDAQclpr;
                        KOSDAQvsElement.textContent = KOSDAQvs;
                        KOSDAQfltRtElement.textContent = KOSDAQfltRt + "%";
                    }
                }
            ).catch(error => {
                console.error("Error발생 :", error);
                throw error;
            });


        if (NASDAQvs.innerText.substring(0, 1) === "+") {
            NASDAQclpr.style.color = "red";
            NASDAQvs.style.color = "red";
            NASDAQfltRt.style.color = "red";
        } else {
            NASDAQclpr.style.color = "blue";
            NASDAQvs.style.color = "blue";
            NASDAQfltRt.style.color = "blue";
        }

        if (SNPvs.innerText.substring(0, 1) === "+") {
            SNPclpr.style.color = "red";
            SNPvs.style.color = "red";
            SNPfltRt.style.color = "red";
        } else {
            SNPclpr.style.color = "blue";
            SNPvs.style.color = "blue";
            SNPfltRt.style.color = "blue";
        }
        //나스닥 snp 색깔 설정 
    </script>
</main>