<x-app-layout style="text-align: center;">

    @include('navigation.school')

    <div
        style="
            max-width: 1600px; 
            margin: 0 auto; 
            background-color: none; 
            border-radius: 10px; 
            padding: 40px; 
            margin-top: 20px;
            "
    >
        <!-- Reduced margin-bottom to tighten spacing -->
        <p style="font-family: 'Roboto Condensed'; font-size: 40px; text-align: center; margin-bottom: -55px;">
            WELCOME TO
        </p>
        <!-- Reduced margin-top to bring EXAM VAULT closer -->
        <p style="font-family: 'Roboto Condensed'; font-size: 150px; text-align: center; margin-top: 1px;">
            EXAM VAULT
        </p>

        <!-- Rest of the content -->
        <p style="font-size: 40px; text-align: center; margin-top: 20px;">
            where you can view any paper and discuss it with other students.
        </p>

        <p style="font-family: 'Roboto Condensed'; font-size: 20px; text-align: center; margin-top: 50px;">
            To view, upload, or discuss a paper, please select a school from the navbar and proceed with your course,
            branch, and semester.
        </p>
    </div>

</x-app-layout>
