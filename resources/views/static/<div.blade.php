                <div 
                    x-data="{ tab: 1 }" 
                    class="relative flex overflow-hidden"
                    >
                    <div class="flex flex-col items-center w-full pt-5 pb-5 mx-auto max-w-container max-lg:px-5">

                        <!-- TABS -->
                        <div class="flex flex-col w-full text-xl max-md:max-w-full">
                        <div class="flex flex-wrap items-center self-center gap-2 max-md:max-w-full">
                            <!-- Tab 1 button -->
                            <button
                            :class="tab === 1 
                                ? 'bg-blue-800 text-white hover:bg-hover hover:text-hover'
                                : 'border-x-2 border-solid border-[var(--Dark-Blue-200,#A4B8D9)] text-blue-800 hover:bg-hover hover:text-hover'"
                            class="flex flex-col items-center justify-center px-5 py-3 my-auto rounded w-fit whitespace-nowrap"
                            :aria-pressed="tab === 1"
                            @click="tab = 1"
                            >
                            <span class="gap-2.5 px-2.5">
                                If you are the first one in your alliance
                            </span>
                            </button>

                            <!-- Tab 2 button -->
                            <button
                            :class="tab === 2 
                                ? 'bg-blue-800 text-white hover:bg-hover hover:text-hover'
                                : 'border-x-2 border-solid border-[var(--Dark-Blue-200,#A4B8D9)] text-blue-800 hover:bg-hover hover:text-hover'"
                            class="flex flex-col items-center justify-center px-5 py-3 my-auto rounded w-fit whitespace-nowrap"
                            :aria-pressed="tab === 2"
                            @click="tab = 2"
                            >
                            <span class="gap-2.5 px-2.5">
                                If you are joining an existing alliance
                            </span>
                            </button>
                        </div>

                        <div class="flex w-full h-px mt-2 bg-indigo-300" role="separator" aria-orientation="horizontal"></div>
                        </div>

                        <!-- TAB CONTENT -->
                        <div class="flex flex-col items-center w-full mt-16 max-md:mt-10 max-md:max-w-full">

                        <!-- CONTENT FOR TAB 1 -->
                        <div 
                            x-show="tab === 1" 
                            x-transition 
                            class="max-w-full w-[907px]"
                        >
                            <!-- paste your step-by-step markup here (the four relative flex blocks + note) -->
                            <div class="max-md:max-w-full">
                            <!-- Step 1 -->
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    1
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                        Download the Telegram app. It is available for <a href="https://desktop.telegram.org/" class="underline text-dark-blue">Desktop</a> (Windows, macOS and Linux), <a href="https://apps.apple.com/app/telegram-messenger/id686449807" class="underline text-dark-blue">iOS</a> and <a href="https://play.google.com/store/apps/details?id=org.telegram.messenger" class="underline text-dark-blue">Android</a> You can play the game either on your PC or laptop, or on your smartphone. We recommend you play it on your computer so that you can get the instructions and solve the coding challenges on the Telegram app on your phone.
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    2
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                        To play the game, <a href="/code-hunting-game" class="underline text-dark-blue">open the game</a> and scan the QR code that will take you to the Telegram app and give you the first set of instructions.
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    3
                                </div>
                                <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                        To win, you need to solve 10 coding challenges and find 10 locations on the map of Europe that are linked to the rise of coding and technology.
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex mb-8 gap-x-8">
                                <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                    4
                                </div>
                                <div class="flex-1">
                                    <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                        After you complete the game, share your score with your friends using #EUCodeWeek and challenge them to play and learn about the history of coding too. Let's see who scores the top results!
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-start w-full gap-2 p-6 bg-white rounded-lg tablet:flex-row">
                                <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                                <div class="text-slate-500">
                                    <p class="font-normal leading-[22px] text-default tablet:leading-[30px] tablet:text-xl p-0">
                                        The Code Week Treasure Hunt is the virtual version of the original EU Code Week Treasure Hunt which was first developed by Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino. To learn more about his original game, visit our <a href="https://blog.codeweek.eu/" class="underline text-dark-blue">blog</a>.
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- CONTENT FOR TAB 2 -->
                        <div 
                            x-show="tab === 2" 
                            x-transition 
                            class="max-w-full w-[907px]"
                        >
                            <div class="max-md:max-w-full">
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        1
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                            Download the Telegram app. It is available for <a href="https://desktop.telegram.org/" class="underline text-dark-blue">Desktop</a> (Windows, macOS and Linux), <a href="https://apps.apple.com/app/telegram-messenger/id686449807" class="underline text-dark-blue">iOS</a> and <a href="https://play.google.com/store/apps/details?id=org.telegram.messenger" class="underline text-dark-blue">Android</a> You can play the game either on your PC or laptop, or on your smartphone. We recommend you play it on your computer so that you can get the instructions and solve the coding challenges on the Telegram app on your phone.
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        2
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                            To play the game, <a href="/code-hunting-game" class="underline text-dark-blue">open the game</a> and scan the QR code that will take you to the Telegram app and give you the first set of instructions.
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex pb-4 gap-x-8 tablet:pb-16">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        3
                                    </div>
                                    <div class="absolute after:content-[''] after:block after:w-[2px] after:h-full after:bg-[#5F718A] left-5 bottom-2 top-12 tablet:top-16"></div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                            To win, you need to solve 10 coding challenges and find 10 locations on the map of Europe that are linked to the rise of coding and technology.
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex mb-8 gap-x-8">
                                    <div class="w-10 h-10 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl bg-primary">
                                        4
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                                            After you complete the game, share your score with your friends using #EUCodeWeek and challenge them to play and learn about the history of coding too. Let's see who scores the top results!
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-start w-full gap-2 p-6 bg-white rounded-lg tablet:flex-row">
                                    <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
                                    <div class="text-slate-500">
                                        <p class="font-normal leading-[22px] text-default tablet:leading-[30px] tablet:text-xl p-0">
                                            The Code Week Treasure Hunt is the virtual version of the original EU Code Week Treasure Hunt which was first developed by Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino. To learn more about his original game, visit our <a href="https://blog.codeweek.eu/" class="underline text-dark-blue">blog</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    </div>