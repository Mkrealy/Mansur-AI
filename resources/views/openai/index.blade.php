


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <div class="flex flex-col space-y-4 p-4">
                        @foreach($messages as $message)
                       
                        <div class="flex rounded-lg p-4 @if ($message['role'] === 'assistant') bg-green-200 flex-reverse @else bg-blue-200 @endif ">
                            <div class="ml-4">
                                <div class="text-lg">
                                    @if ($message['role'] === 'assistant')
                                    <a href="#" class="font-medium text-gray-900">Mansur AI :</a>
                                    @else
                                    <a href="#" class="font-medium text-gray-900">Sen :</a>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <p class="text-gray-600">
                                        {!! \Illuminate\Mail\Markdown::parse($message['content']) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <form class="mt-6 space-y-6 asdasd"action="/openai/send" method="post">
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="message">
                            Mansur AI Sorun :
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="message" type="text" name="message" autocomplete="off">
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Sor
                            </button>
                            <button href="openai/reset" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Temizle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
<form class="p-4 flex space-x-4 justify-center items-center" >
    @csrf
    <label for="message"></label>
    <input  class="border rounded-md  p-2 flex-1" />
    <a class="bg-gray-800 text-white p-2 rounded-md" >Mesajları sil</a>
</form>

