<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Email Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
.succesful {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;

        }

        .not_succesful {
            background-color: #fffbeb;
            border: 1px solid #fed7aa;
            color: #92400e;

        }

        .alert {
            border-radius: 0.5rem;
            padding: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .alert-icon {
            height: 1.25rem;
            width: 1.25rem;
            margin-top: 0.125rem;
            flex-shrink: 0;
        }

        .alert-content {
            flex: 1;
        }

        .alert-title {
            font-size: 0.875rem;
            font-weight: 500;
            margin: 0;
        }
</style>
     
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-40 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <div class="w-full max-w-lg relative z-10">
        <!-- Main Card -->
        <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8 relative overflow-hidden">
            <!-- Card Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-white/10"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-purple-400/20 to-transparent rounded-full blur-2xl"></div>
            
            <!-- Header -->
            <div class="text-center mb-8 relative">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-500 to-cyan-500 rounded-2xl mb-4 shadow-lg">
                    <i class="fas fa-envelope text-2xl text-white"></i>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent mb-2">
                    Send Email
                </h1>
                <p class="text-white/70 text-lg">Share your thoughts with the world</p>
            </div>

            <!-- Form -->
            <form class="space-y-6 relative" method="post">
                @csrf

                @if (session('alert'))
                @if (session('alert') == 'succesful')
                    <x-alert alert="succesful" message="Succesfuly send email message.." />
                @elseif(session('alert') == 'not_succesful')
                    <x-alert alert="not_succesful" message="Incorrect data.." />
                @else

                @endif
            @endif
                
                <!-- Email Input -->
                <div class="group">
                    <label class="block text-white/90 text-sm font-semibold mb-3 flex items-center" for="email">
                        <i class="fas fa-envelope text-purple-300 mr-2"></i>
                        Email Address
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" placeholder="sujit@gmail.com"
                            class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border-2 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-4 focus:ring-purple-500/30 focus:border-purple-400 transition-all duration-300 @error('email') border-red-400 @else border-white/20 @enderror group-hover:border-purple-300/50">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-purple-300 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    
                        <div class="h-1 text-red-300 text-sm flex items-center p-3">
                        @error('email')
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        @enderror
                        </div>
                </div>

                <!-- Subject Input -->
                <div class="group">
                    <label class="block text-white/90 text-sm font-semibold mb-3 flex items-center" for="subject">
                        <i class="fas fa-tag text-purple-300 mr-2"></i>
                        Subject
                    </label>
                    <div class="relative">
                        <input type="text" id="subject" name="subject" placeholder="Enter subject line"
                            class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border-2 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-4 focus:ring-purple-500/30 focus:border-purple-400 transition-all duration-300 @error('subject') border-red-400 @else border-white/20 @enderror group-hover:border-purple-300/50">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-purple-300 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>

                    <div class="h-1 text-red-300 text-sm flex items-center p-3">
                        @error('subject')
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        @enderror
                        </div>
                </div>

                <!-- Number of Times Input -->
                <div class="group">
                    <label class="block text-white/90 text-sm font-semibold mb-3 flex items-center" for="send_times">
                        <i class="fas fa-repeat text-purple-300 mr-2"></i>
                        How many times to send this message
                    </label>
                    <div class="relative">
                        <input type="number" id="send_times" name="send_times" placeholder="Enter number (e.g., 1, 5, 10)" min="1" max="100" step="1"
                            class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border-2 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-4 focus:ring-purple-500/30 focus:border-purple-400 transition-all duration-300 @error('send_times') border-red-400 @else border-white/20 @enderror group-hover:border-purple-300/50">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-purple-300 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </div>

                     <div class="h-1 text-red-300 text-sm flex items-center p-3">
                        @error('send_times')
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        @enderror
                        </div>
                </div>

                <!-- Message Textarea -->
                <div class="group">
                    <label class="block text-white/90 text-sm font-semibold mb-3 flex items-center" for="message">
                        <i class="fas fa-comment-alt text-purple-300 mr-2"></i>
                        Message
                    </label>
                    <div class="relative">
                        <textarea id="message" name="message" rows="5" placeholder="Type your message here..."
                            class="w-full px-6 py-4 bg-white/10 backdrop-blur-sm border-2 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-4 focus:ring-purple-500/30 focus:border-purple-400 transition-all duration-300 resize-none @error('message') border-red-400 @else border-white/20 @enderror group-hover:border-purple-300/50"></textarea>
                        <div class="absolute right-4 top-4 text-purple-300 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-pen-fancy"></i>
                        </div>
                    </div>

                     <div class="h-1 text-red-300 text-sm flex items-center p-3">
                        @error('message')
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        @enderror
                        </div>
                </div>

                <!-- Send Button -->
                <button type="submit" name="submit"
                    class="w-full bg-gradient-to-r from-purple-600 via-purple-500 to-cyan-500 text-white font-bold py-4 px-8 rounded-2xl shadow-2xl hover:shadow-purple-500/25 transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-purple-500/50 relative overflow-hidden group mt-8">
                    <span class="relative z-10 flex items-center justify-center text-lg">
                        <i class="fas fa-paper-plane mr-3 text-xl"></i>
                        Send Email
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 via-purple-600 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <!-- Button Shine Effect -->
                    <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                </button>
            </form>

            

        
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        /* Hide number input spinner buttons */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

</body>

</html>