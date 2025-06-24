<div>
    <section class="grid grid-cols-1 mt-5">
        @foreach ($councilMembers as $member)
            <div class="flex flex-col-reverse justify-between items-start md:flex-row" role="main" aria-labelledby="profile-heading">
                <article class="flex flex-col w-full max-w-[632px] max-md:max-w-full">
                    <div class="flex flex-row gap-6 items-center w-full text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                        <h2 id="profile-heading" class="text-dark-blue text-[22px] md:text-[36px] font-medium font-['Montserrat']">
                          {{ $member->name }}
                        </h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="38" viewBox="0 0 56 38" fill="none">
                        <g filter="url(#filter0_d_3503_26825)">
                            <mask id="mask0_3503_26825" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="48" height="30">
                            <rect x="4" y="4" width="48" height="30" rx="2" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_3503_26825)">
                            <rect x="4" y="4" width="48" height="3.33333" fill="#002AC5"/>
                            <rect x="4" y="7.33337" width="48" height="3.33333" fill="white"/>
                            <rect x="4" y="10.6666" width="48" height="3.33333" fill="#002AC5"/>
                            <rect x="4" y="14" width="48" height="3.33333" fill="white"/>
                            <rect x="4" y="17.3334" width="48" height="3.33333" fill="#002AC5"/>
                            <rect x="4" y="20.6666" width="48" height="3.33333" fill="white"/>
                            <rect x="4" y="24" width="48" height="3.33333" fill="#002AC5"/>
                            <rect x="4" y="27.3334" width="48" height="3.33333" fill="white"/>
                            <rect x="4" y="30.6666" width="48" height="3.33333" fill="#002AC5"/>
                            <rect x="4" y="4" width="16.66" height="16.66" fill="#002AC5"/>
                            <rect x="4" y="10.67" width="16.66" height="3.33" fill="white"/>
                            <rect x="10.6641" y="20.665" width="16.66" height="3.33" transform="rotate(-90 10.6641 20.665)" fill="white"/>
                            </g>
                        </g>
                        <defs>
                            <filter id="filter0_d_3503_26825" x="0" y="0" width="56" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3503_26825"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3503_26825" result="shape"/>
                            </filter>
                        </defs>
                        </svg>
                    </div>

                    <span class="mt-6 text-3xl font-medium leading-tight text-gray-700 max-md:max-w-full">
                      {{ $member->title }}
                    </span>

                    <img
                        src="{{ $member->image }}"
                        alt="Portrait of Stamatis Papadakis, EU Code Week Council President"
                        class="object-cover h-full max-h-[396px] w-full mt-6 md:hidden block rounded-[12px]"
                    />

                    <p class="mt-6 text-xl leading-8 text-gray-700 w-full  md:max-w-[90%]">
                         {{ $member->description }}
                    </p>

                    <span class="mt-6 text-2xl leading-none text-zinc-800 max-md:max-w-full">
                        Get in touch
                    </span>

<div class="flex gap-[22px] my-10 xl:mb-0">
                        <a class="cookweek-link hover-underline" href="https://www.linkedin.com/company/codeweek/" target="_blank" rel="noreferer, noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3 6.06775C3 5.51935 3.22592 4.99341 3.62806 4.60563C4.0302 4.21785 4.57562 4 5.14433 4H26.52C26.8018 3.99956 27.081 4.05272 27.3415 4.15645C27.602 4.26018 27.8387 4.41244 28.0381 4.60451C28.2375 4.79657 28.3957 5.02468 28.5035 5.27576C28.6114 5.52685 28.6668 5.79598 28.6667 6.06775V26.68C28.667 26.9518 28.6117 27.221 28.504 27.4722C28.3963 27.7235 28.2383 27.9517 28.039 28.144C27.8397 28.3362 27.6031 28.4887 27.3427 28.5927C27.0822 28.6967 26.8031 28.7502 26.5212 28.75H5.14433C4.86264 28.75 4.5837 28.6965 4.32346 28.5925C4.06322 28.4885 3.82678 28.3361 3.62765 28.144C3.42851 27.9518 3.27059 27.7238 3.16289 27.4728C3.0552 27.2218 2.99985 26.9528 3 26.6811V6.06775ZM13.1593 13.4365H16.6348V15.1195C17.1365 14.152 18.4198 13.2813 20.3483 13.2813C24.0455 13.2813 24.9217 15.2084 24.9217 18.7443V25.294H21.1802V19.5498C21.1802 17.536 20.6785 16.3998 19.4045 16.3998C17.637 16.3998 16.902 17.6249 16.902 19.5498V25.294H13.1593V13.4365ZM6.74267 25.1399H10.4853V13.2813H6.74267V25.1388V25.1399ZM11.0208 9.4135C11.0279 9.72251 10.9709 10.0298 10.8531 10.3172C10.7354 10.6047 10.5592 10.8666 10.3351 11.0875C10.111 11.3085 9.84332 11.484 9.54786 11.6039C9.25241 11.7237 8.93511 11.7855 8.61458 11.7855C8.29405 11.7855 7.97675 11.7237 7.6813 11.6039C7.38585 11.484 7.1182 11.3085 6.89406 11.0875C6.66992 10.8666 6.49381 10.6047 6.37605 10.3172C6.2583 10.0298 6.20128 9.72251 6.20833 9.4135C6.22218 8.80696 6.48178 8.22977 6.93153 7.80552C7.38128 7.38128 7.98543 7.14372 8.61458 7.14372C9.24374 7.14372 9.84788 7.38128 10.2976 7.80552C10.7474 8.22977 11.007 8.80696 11.0208 9.4135Z" fill="#1C4DA1"></path>
</svg>
                        </a>
                        <a class="cookweek-link hover-underline" href="https://twitter.com/CodeWeekEU" target="_blank" rel="noreferer, noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
<path d="M22.6875 5H26.5214L18.1464 14.7416L28 28H20.2857L14.2393 19.9605L7.32857 28H3.49107L12.4482 17.5768L3 5.00181H10.9107L16.3679 12.3488L22.6875 5ZM21.3393 25.6652H23.4643L9.75 7.21335H7.47143L21.3393 25.6652Z" fill="#1C4DA1"></path>
</svg>
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.instagram.com/codeweekeu/" target="_blank" rel="noreferer, noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
<path d="M11.84 16C11.84 16.8228 12.084 17.6271 12.5411 18.3112C12.9982 18.9953 13.6479 19.5285 14.408 19.8433C15.1682 20.1582 16.0046 20.2406 16.8116 20.0801C17.6185 19.9196 18.3598 19.5233 18.9416 18.9416C19.5234 18.3598 19.9196 17.6185 20.0801 16.8116C20.2406 16.0046 20.1582 15.1682 19.8433 14.408C19.5285 13.6479 18.9953 12.9982 18.3112 12.5411C17.6271 12.084 16.8228 11.84 16 11.84C14.8978 11.8434 13.8416 12.2828 13.0622 13.0622C12.2828 13.8416 11.8434 14.8978 11.84 16ZM3 10.28V21.72C3 23.6508 3.767 25.5025 5.13226 26.8677C6.49753 28.233 8.34922 29 10.28 29H21.72C23.6508 29 25.5025 28.233 26.8677 26.8677C28.233 25.5025 29 23.6508 29 21.72V10.28C29 8.34922 28.233 6.49753 26.8677 5.13226C25.5025 3.767 23.6508 3 21.72 3H10.28C8.34922 3 6.49753 3.767 5.13226 5.13226C3.767 6.49753 3 8.34922 3 10.28ZM9.76 16C9.76 14.7658 10.126 13.5594 10.8116 12.5332C11.4973 11.5071 12.4718 10.7073 13.6121 10.235C14.7523 9.7627 16.0069 9.63913 17.2174 9.8799C18.4278 10.1207 19.5397 10.715 20.4123 11.5877C21.285 12.4603 21.8793 13.5722 22.1201 14.7826C22.3609 15.9931 22.2373 17.2477 21.765 18.3879C21.2927 19.5282 20.4929 20.5027 19.4668 21.1884C18.4406 21.874 17.2342 22.24 16 22.24C14.345 22.24 12.7579 21.5826 11.5877 20.4123C10.4174 19.2421 9.76 17.655 9.76 16ZM7.68 9.24C7.68 8.93146 7.77149 8.62985 7.94291 8.37331C8.11432 8.11677 8.35796 7.91682 8.64301 7.79875C8.92807 7.68068 9.24173 7.64978 9.54434 7.70997C9.84695 7.77017 10.1249 7.91874 10.3431 8.13691C10.5613 8.35508 10.7098 8.63305 10.77 8.93566C10.8302 9.23827 10.7993 9.55193 10.6813 9.83699C10.5632 10.122 10.3632 10.3657 10.1067 10.5371C9.85015 10.7085 9.54854 10.8 9.24 10.8C8.82626 10.8 8.42947 10.6356 8.13692 10.3431C7.84436 10.0505 7.68 9.65374 7.68 9.24Z" fill="#1C4DA1"></path>
</svg>
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA" target="_blank" rel="noreferer, noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
<path d="M30.2366 8.0274C30.1135 7.52236 29.8725 7.05539 29.5343 6.6665C29.1961 6.27761 28.7707 5.9784 28.2946 5.79452C23.7143 3.9863 16.4018 4 16 4C15.5982 4 8.28571 3.9863 3.70536 5.79452C3.2293 5.9784 2.80392 6.27761 2.4657 6.6665C2.12748 7.05539 1.88649 7.52236 1.76339 8.0274C1.41518 9.38356 1 11.8767 1 16C1 20.1233 1.41518 22.6164 1.76339 23.9726C1.88649 24.4776 2.12748 24.9446 2.4657 25.3335C2.80392 25.7224 3.2293 26.0216 3.70536 26.2055C8.09821 27.9452 14.9821 28 15.9062 28H16.0937C17.0179 28 23.9018 27.9452 28.2946 26.2055C28.7707 26.0216 29.1961 25.7224 29.5343 25.3335C29.8725 24.9446 30.1135 24.4776 30.2366 23.9726C30.5848 22.6164 31 20.1233 31 16C31 11.8767 30.5848 9.38356 30.2366 8.0274ZM20.5804 16.4521L14.1518 20.8356C14.0665 20.8998 13.963 20.9335 13.8571 20.9315C13.7684 20.9281 13.6815 20.9047 13.6027 20.863C13.5171 20.8175 13.4455 20.7486 13.3958 20.6639C13.3462 20.5793 13.3204 20.4823 13.3214 20.3836V11.6164C13.3204 11.5177 13.3462 11.4207 13.3958 11.3361C13.4455 11.2514 13.5171 11.1825 13.6027 11.137C13.6881 11.0904 13.7842 11.0683 13.8809 11.0731C13.9776 11.078 14.0712 11.1095 14.1518 11.1644L20.5804 15.5479C20.6551 15.5961 20.7166 15.6628 20.7593 15.7418C20.8019 15.8209 20.8243 15.9097 20.8243 16C20.8243 16.0903 20.8019 16.1791 20.7593 16.2582C20.7166 16.3372 20.6551 16.4039 20.5804 16.4521Z" fill="#1C4DA1"></path>
</svg>
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.facebook.com/codeEU/" target="_blank" rel="noreferer, noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
<path d="M27.5592 3H4.44083C4.05958 3.00283 3.69474 3.15555 3.42514 3.42514C3.15555 3.69474 3.00283 4.05958 3 4.44083V27.5592C3.00283 27.9404 3.15555 28.3053 3.42514 28.5749C3.69474 28.8445 4.05958 28.9972 4.44083 29H16.8883V18.9467H13.5083V15.0142H16.8883V12.1217C16.8883 8.76333 18.9358 6.9325 21.9475 6.9325C22.955 6.9325 23.9625 6.9325 24.97 7.08417V10.5833H22.9008C21.265 10.5833 20.9508 11.3633 20.9508 12.5008V15.0033H24.8508L24.3417 18.9358H20.9508V29H27.5592C27.9404 28.9972 28.3053 28.8445 28.5749 28.5749C28.8445 28.3053 28.9972 27.9404 29 27.5592V4.44083C28.9972 4.05958 28.8445 3.69474 28.5749 3.42514C28.3053 3.15555 27.9404 3.00283 27.5592 3Z" fill="#1C4DA1"></path>
</svg>
                        </a>
                    </div>
                </article>

                <aside class="flex justify-center items-center max-md:max-w-full" aria-label="Profile image">
                    <img
                        src="{{ $member->image }}"
                        alt="Portrait of Stamatis Papadakis, EU Code Week Council President"
                        class="object-contain md:object-cover w-full max-w-[643px] h-full max-h-[646px] max-md:hidden block rounded-[12px]"
                    />
                </aside>
            </div>
        @endforeach
    </section>
</div>


