using System;
using System.Linq; // Required for Sum()

namespace DiceGame
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Welcome to the Dice Game!");

            Console.WriteLine("Enter your name: ");
            string playerName = Console.ReadLine();

            int randomNumber = GenerateRandomNumber(playerName);
            // Console.WriteLine($"The random number is: {randomNumber}"); // For verification

            PlayGameLoop(playerName, randomNumber);
        }

        private static int GetValidatedGuess()
        {
            int guess;
            while (true)
            {
                Console.WriteLine("Guess a number between 1 and 6: ");
                string guessString = Console.ReadLine();
                if (int.TryParse(guessString, out guess) && guess >= 1 && guess <= 6)
                {
                    break;
                }
                else
                {
                    Console.WriteLine("Invalid input. Please enter a number between 1 and 6.");
                }
            }
            return guess;
        }

        private static void PlayGameLoop(string playerName, int randomNumber)
        {
            int guess = GetValidatedGuess();

            while (guess != randomNumber)
            {
                Console.WriteLine("Try again.");
                guess = GetValidatedGuess();
            }

            Console.WriteLine("You won!");
        }

        public static int GenerateRandomNumber(string name)
        {
            long timeTicks = DateTime.Now.Ticks;

            int nameValue = 0;
            if (string.IsNullOrEmpty(name))
            {
                nameValue = 1; // Default to 1 if name is empty or null
            }
            else
            {
                nameValue = name.Sum(c => (int)c);
                if (nameValue == 0) nameValue = 1; // Ensure nameValue is at least 1
            }

            // Chaotic Element Implementation
            double x = (double)(timeTicks % 10000) / 10000.0; // Initial x (0.0 to 0.9999)
            double r = 3.57 + (nameValue % 43) / 100.0;   // Parameter r (3.57 to 3.99)

            for (int i = 0; i < 20; i++) // Iterate 20 times
            {
                x = r * x * (1 - x);
                if (x <= 0 || x >= 1) // Handle cases where x goes out of (0,1) range
                {
                    x = (double)((timeTicks >> (i % 30)) % 10000) / 10000.0; // Reset x based on different parts of timeTicks
                    if (x <= 0) x = 0.01; // Ensure x is not zero after reset
                }
            }

            // Seed Generation
            int seed = (int)(x * 1000000) + (int)(timeTicks & 0xFFFFFF) + nameValue;

            Random random = new Random(seed);
            return random.Next(1, 7); // Generates a number between 1 and 6
        }
    }
}
