import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		"./resources/**/*.vue",
	],
	safelist: [
		"bg-green-500",
		"bg-black",
		"bg-red-500",
		"bg-yellow-500",
		"bg-gray-500",
		"text-black",
		"text-white",
		"rounded-md",
	],
	theme: {
		extend: {
			fontFamily: {
				sans: ["Figtree", ...defaultTheme.fontFamily.sans],
			},
		},
	},
	plugins: [],
};
