@extends('layouts.app')

@section('content')
<div class="relative w-full min-h-screen flex items-center" 
    style="background-image: url('{{ asset('assets/images/background.png') }}'); background-size: cover; background-position: center; margin-top: 0; padding-top: 0;">
    
    {{-- Hero Section --}}
    <div class="flex flex-col md:flex-row justify-between items-center w-full h-full px-16 md:px-24 py-48">
        <div class="flex flex-col items-start">
            <h1 class="text-3xl md:text-5xl font-bold text-black mb-6 md:mb-8">Timeless Treasures, <br> Vintage Pleasures.</h1>
            <button class="auth-trigger mt-4 px-8 py-3 rounded-lg border-2 border-black text-black bg-transparent transition duration-300 hover:bg-green-900 hover:text-white">
                Shop Now!
            </button>
        </div>
        <div class="mt-6 md:mt-0 flex flex-col items-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Auntie Go Logo" class="w-72 md:w-96">
        </div>
    </div>
</div>

{{-- Icons for Cart and Profile --}}
<div class="fixed top-5 right-10 flex gap-6">
    <button class="auth-trigger text-gray-800 hover:text-green-900 transition">
        <span class="iconify text-3xl" data-icon="mdi:cart"></span>
    </button>
    <button class="auth-trigger text-gray-800 hover:text-green-900 transition">
        <span class="iconify text-3xl" data-icon="mdi:account"></span>
    </button>
</div>

{{-- Login & Register Modal --}}
<div id="auth-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div id="modal-content" class="relative bg-white w-[400px] px-8 py-6 rounded-lg shadow-lg">
        
        {{-- Login Form --}}
        <div id="login-section">
            <h2 class="text-2xl font-bold mb-4 text-center">Welcome to Auntie Go</h2>
            <form>
                <div class="mb-3">
                    <label class="text-gray-700 text-sm font-medium">Enter Email</label>
                    <input type="email" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300">
                </div>
                <div class="mb-3">
                    <label class="text-gray-700 text-sm font-medium">Enter Password</label>
                    <div class="relative">
                        <input type="password" id="login-password" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300 pr-10">
                        <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700" onclick="togglePassword('login-password', 'icon-login')">
                            <span class="iconify text-xl" id="icon-login" data-icon="mdi:eye-off"></span>
                        </button>
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-900 text-white py-2 rounded text-lg font-semibold hover:bg-green-700 transition">
                    Sign In
                </button>
                <div class="flex justify-between text-sm text-gray-600 mt-3">
                    <a href="#" class="hover:underline">Forgot Password?</a>
                    <button id="toggle-signup" class="hover:underline">Create Account</button>
                </div>
            </form>
        </div>

        {{-- Register Form (Initially Hidden) --}}
        <div id="signup-section" class="hidden">
            <h2 class="text-2xl font-bold mb-4 text-center">Create Account</h2>
            <form>
                <div class="flex gap-2 mb-3">
                    <input type="text" class="w-1/2 px-4 py-2 border rounded focus:ring focus:ring-green-300" placeholder="First Name">
                    <input type="text" class="w-1/2 px-4 py-2 border rounded focus:ring focus:ring-green-300" placeholder="Last Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300" placeholder="Email">
                </div>

                {{-- Password Fields --}}
                <div class="mb-3">
    <label class="text-gray-700 text-sm font-medium">Enter Password</label>
    <div class="relative">
        <input type="password" id="signup-password" 
            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring focus:ring-green-300 pr-12" 
            placeholder="Enter Password">
        <button type="button" class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-gray-700" 
            onclick="togglePassword('signup-password', 'icon-signup')">
            <span class="iconify text-2xl" id="icon-signup" data-icon="mdi:eye-off"></span>
        </button>
    </div>
</div>

<div class="mb-3">
    <label class="text-gray-700 text-sm font-medium">Re-enter Password</label>
    <div class="relative">
        <input type="password" id="confirm-password" 
            class="w-full px-4 py-2 border border-gray-400 rounded focus:ring focus:ring-green-300 pr-12" 
            placeholder="Re-enter Password">
        <button type="button" class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-gray-700" 
            onclick="togglePassword('confirm-password', 'icon-confirm')">
            <span class="iconify text-2xl" id="icon-confirm" data-icon="mdi:eye-off"></span>
        </button>
    </div>
</div>





                {{-- Terms and Conditions --}}
                <div class="flex items-center gap-2 mt-4">
                    <input type="checkbox" id="terms" class="w-5 h-5 accent-green-700" required>
                    <label for="terms" class="text-sm text-gray-700">
                        I read and agreed to the <a href="#" class="text-green-700 font-semibold hover:underline">Terms and Conditions</a>
                    </label>
                </div>

                <button type="submit" class="w-full bg-green-900 text-white py-2 rounded text-lg font-semibold hover:bg-green-700 transition mt-3">
                    Create Account
                </button>
                <div class="text-center text-sm text-gray-600 mt-3">
                    <button id="toggle-login" class="hover:underline">Already have an account? Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Load Iconify --}}
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

{{-- JavaScript for Modal and Password Toggle --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".auth-trigger").forEach(trigger => {
            trigger.addEventListener("click", () => document.getElementById("auth-modal").classList.remove("hidden"));
        });

        document.getElementById("auth-modal").addEventListener("click", function (event) {
            if (!document.getElementById("modal-content").contains(event.target)) this.classList.add("hidden");
        });

        document.getElementById("toggle-signup").addEventListener("click", function () {
            document.getElementById("login-section").classList.add("hidden");
            document.getElementById("signup-section").classList.remove("hidden");
        });

        document.getElementById("toggle-login").addEventListener("click", function () {
            document.getElementById("signup-section").classList.add("hidden");
            document.getElementById("login-section").classList.remove("hidden");
        });
    });

    function togglePassword(inputId, iconId) {
        let input = document.getElementById(inputId);
        let icon = document.getElementById(iconId);
        input.type = input.type === "password" ? "text" : "password";
        icon.dataset.icon = input.type === "password" ? "mdi:eye-off" : "mdi:eye";
    }
</script>
@endsection
