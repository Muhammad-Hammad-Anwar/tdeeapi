<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
            'quiz_id' => '1',
            'title' => 'What is the integral of x^2 with respect to x?',
            'options' => 'x^3 + C, 2x + C, (1/2)x^3 + C,x^2 + C',
            'answer' => '(1/2)x^3 + C',
            'hint' => 'To find the integral of x^2 with respect to x, you need to use the power rule',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of x^2 with respect to x?',
                'options' => 'x^3 + C, 2x + C, (1/2)x^3 + C, x^2 + C',
                'answer' => '1/2)x^3 + C',
                'hint' => 'To find the integral of x^2 with respect to x, you need to use the power rule of integration, which states that the integral of x^n with respect to x is equal to (1/(n+1))x^(n+1) plus a constant term (C). Apply this rule to x^2 and see which of the given options matches the result.',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of e^x with respect to x?',
                'options' => 'e^x + C, 1 + C, ln(x) + C, cos(x) + C',
                'answer' => 'e^x + C',
                'hint' => 'To find the integral of e^x with respect to x, simply recall that the derivative of e^x is itself, and therefore the integral of e^x must be e^x plus a constant term (C).',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of sin(x) with respect to x?',
                'options' => 'cos(x) + C, sin(x) + C, -cos(x) + C, -sin(x) + C',
                'answer' => 'cos(x) + C',
                'hint' => 'To find the integral of sin(x) with respect to x, recall that the derivative of cos(x) is -sin(x), and therefore the integral of sin(x) must be -cos(x) plus a constant term (C). However, in this case, the negative sign is not necessary since we are not concerned with the sign of the constant term.',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of 1/x with respect to x?',
                'options' => 'ln(x) + C, x^2 + C, e^x + C, cos(x) + C',
                'answer' => 'ln(x) + C',
                'hint' => 'To find the integral of 1/x with respect to x, recall that the derivative of ln(x) is 1/x, and therefore the integral of 1/x must be ln(x) plus a constant term (C).',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of cos(x) with respect to x?',
                'options' => 'sin(x) + C, cos(x) + C, -sin(x) + C, -cos(x) + C',
                'answer' => 'cos(x) + C',
                'hint' => 'To find the integral of cos(x) with respect to x, recall that the derivative of sin(x) is cos(x), and therefore the integral of cos(x) must be sin(x) plus a constant term (C).',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of 3x with respect to x?',
                'options' => 'x^3 + C, 2x + C, 3x + C, (3/2)x^2 + C',
                'answer' => '(3/2)x^2 + C',
                'hint' => 'To find the integral of 3x with respect to x, simply apply the power rule of integration, which states that the integral of x^n with respect to x is equal to (1/(n+1))x^(n+1) plus a constant term (C).',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of 1/(x^2 + 1) with respect to x?',
                'options' => 'arctan(x) + C, ln(x) + C, sin(x) + C, cos(x) + C',
                'answer' => 'arctan(x) + C',
                'hint' => 'To find the integral of 1/(x^2 + 1) with respect to x, use the substitution method and let u = x^2 + 1. Then, the integral becomes the arctangent of u plus a constant term (C).',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of x/(x^2 + 1) with respect to x?',
                'options' => 'ln(x) + C, arctan(x) + C, sin(x) + C, cos(x) + C',
                'answer' => 'arctan(x) + C',
                'hint' => 'To integrate x/(x^2 + 1) with respect to x, you can use the substitution u = x^2 + 1, which gives you du/dx = 2x. Then you can rewrite the integral in terms of u and use the formula for the integral of arctan(u), which is arctan(u) + C.',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of 2cos(3x) with respect to x?',
                'options' => '2sin(3x) + C, 3sin(2x) + C, 2sin(2x) + C, 3sin(3x) + C',
                'answer' => '2sin(3x) + C',
                'hint' => 'To integrate 2cos(3x) with respect to x, you can use the formula for the integral of cos(ax), which is sin(ax)/a + C. In this case, a = 3, so the answer is 2sin(3x)/3 + C, which can be simplified to 2/3 sin(3x) + C.',
            ],
            [
                'quiz_id' => '1',
                'title' => 'What is the integral of ln(x) with respect to x?',
                'options' => 'xln(x) - x + C, x^2/2 + C, e^x + C, cos(x) + C',
                'answer' => 'xln(x) - x + C',
                'hint' => 'To integrate ln(x) with respect to x, you can use integration by parts with u = ln(x) and dv/dx = 1. This gives you v = x and du/dx = 1/x. Then the integral can be written as xln(x) - x + C. Note that this integration by parts formula is derived from the product rule for differentiation.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of 2x^3 + 3x^2 + 1 with respect to x?',
                'options' => '(1/2)x^4 + x^3 + x + C, x^3 + x^2 + x + C, 3x^3 + 2x^2 + x + C, x^4 + x^3 + x + C',
                'answer' => '(1/2)x^4 + x^3 + x + C',
                'hint' => 'To find the antiderivative of a polynomial function, you can use the power rule of integration, which states that the antiderivative of x^n is (1/(n+1))x^(n+1). Apply this rule to each term in the given polynomial and add a constant of integration at the end.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of (2x + 1)^2 with respect to x?',
                'options' => '(4/3)x^3 + 2x^2 + x + C, 4x^3 + 6x^2 + 3x + C, (2/3)x^3 + 2x^2 + x + C, 4x^2 + 4x + 1/3 + C',
                'answer' => '(4/3)x^3 + 2x^2 + x + C',
                'hint' => 'To integrate a polynomial function of the form (ax+b)^n, use the binomial theorem to expand the expression and then integrate each term using the power rule of integration. Don\'t forget to add a constant of integration at the end.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of 1/(1 + x^2) with respect to x?',
                'options' => 'arctan(x) + C, ln(x) + C, sin(x) + C, cos(x) + C',
                'answer' => 'arctan(x) + C',
                'hint' => 'To integrate a rational function of the form 1/(ax^2 + bx + c), use the substitution method by letting u = ax^2 + bx + c and then completing the square to convert the integrand to a form that you can integrate easily. The final result will involve the arctangent function.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of (x + 2)(2x + 1) with respect to x?',
                'options' => '(1/3)x^3 + (5/2)x^2 + 2x + C, x^3 + x^2 + x + C, (2/3)x^3 + 3x^2 + 2x + C, 2x^4 + 5x^3 + 2x^2 + C',
                'answer' => '(1/3)x^3 + (5/2)x^2 + 2x + C',
                'hint' => 'To find the integral of a polynomial expression, you can use the distributive property of multiplication and then apply the power rule of integration. Remember that the power rule states that the integral of x^n with respect to x is (1/(n+1))x^(n+1) + C, where C is the constant of integration.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of 1/(x^2 - 4) with respect to x?',
                'options' => '(1/4)ln((x - 2)/(x + 2)) + C, ln(x) + C, sin(x) + C, cos(x) + C',
                'answer' => '(1/4)ln((x - 2)/(x + 2)) + C',
                'hint' => 'To solve this integral, use partial fraction decomposition to write 1/(x^2-4) as a sum of simpler fractions, then use substitution to integrate. Remember that the integral of 1/x with respect to x is ln|x| + C.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of e^(3x + 2) with respect to x?',
                'options' => '(1/3)e^(3x + 2) + C, e^(3x + 2) + C, (1/3)e^(3x) + C, e^(2x) + C',
                'answer' => '(1/3)e^(3x + 2) + C',
                'hint' => 'To solve this integral, use the power rule of integration, then include the constant of integration, C.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of xcos(x) with respect to x?',
                'options' => 'xsin(x) + cos(x) + C, xsin(x) - cos(x) + C, xcos(x) - sin(x) + C, xcos(x) + sin(x) + C',
                'answer' => 'xsin(x) + cos(x) + C',
                'hint' => 'To solve this integral, use integration by parts with u = x and dv = cos(x)dx, then apply the product rule of differentiation. Remember that the integral of sin(x) with respect to x is -cos(x) + C, and the integral of cos(x) with respect to x is sin(x) + C.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of 1/sqrt(1 - x^2) with respect to x?',
                'options' => 'arcsin(x) + C, arccos(x) + C, arctan(x) + C,  ln(x) + C',
                'answer' => 'arcsin(x) + C',
                'hint' => 'To solve this integral, use the substitution u = 1 - x^2 and the trigonometric substitution x = sin(t). Then, use the definition of the inverse sine function to obtain the answer.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of 1/(1 + x^2)^2 with respect to x?',
                'options' => '(1/2)arctan(x) - (1/2)(1/(1 + x^2)) + C, (1/2)arctan(x) - (1/(1 + x^2)) + C, (1/3)arctan(x) - (1/(1 + x^2)) + C, (1/4)arctan(x) - (1/(1 + x^2)) + C',
                'answer' => '(1/2)arctan(x) - (1/2)(1/(1 + x^2)) + C',
                'hint' => 'To solve this integral, use the substitution u = tan(x) and the power rule of integration. Then, use the formula for the inverse tangent function to obtain the answer.',
            ],
            [
                'quiz_id' => '2',
                'title' => 'What is the integral of xln(x) with respect to x?',
                'options' => '(1/2)x^2ln(x) - (1/4)x^2 + C, (1/2)x^2ln(x) - (1/2)x^2 + C, x^2ln(x) - x^2 + C, (1/3)x^3ln(x) - (1/6)x^3 + C',
                'answer' => '(1/2)x^2ln(x) - (1/4)x^2 + C',
                'hint' => 'To solve this integral, use integration by parts with u = ln(x) and dv = x dx. Then, apply the product rule of differentiation and the power rule of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of x^2 with respect to x?',
                'options' => 'x^2, x, 2x^2, 4x',
                'answer' => 'x^2/2',
                'hint' => 'To integrate a monomial, you can use the power rule of integration which states that the integral of x^n with respect to x is (1/(n+1))x^(n+1) + C, where C is the constant of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 2x with respect to x?',
                'options' => 'x^2, x, 2x^2, 4x',
                'answer' => 'x',
                'hint' => 'To integrate a linear function, you can use the power rule of integration which states that the integral of x^n with respect to x is (1/(n+1))x^(n+1) + C, where C is the constant of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 3 with respect to x?',
                'options' => '3x, 3x^2, 3, 0',
                'answer' => '3x',
                'hint' => 'The integral of a constant function with respect to x is equal to the constant multiplied by x plus a constant of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of sin(x) with respect to x?',
                'options' => 'cos(x), sin(x), -cos(x), -sin(x)',
                'answer' => 'cos(x)',
                'hint' => 'The integral of sine function with respect to x is equal to negative cosine function plus a constant of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of e^x with respect to x?',
                'options' => 'e^x, ln(x), e^(2x), cos(x)',
                'answer' => 'e^x',
                'hint' => 'The integral of the exponential function with respect to x is equal to the function itself plus a constant of integration.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 1/x with respect to x?',
                'options' => 'ln(x), e^x, x^2, cos(x)',
                'answer' => 'ln(x)',
                'hint' => 'Remember that the integral of 1/x is ln|x| + C.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 2cos(x) with respect to x?',
                'options' => '2sin(x), 2cos(x), -2sin(x), -2cos(x)',
                'answer' => '2sin(x)',
                'hint' => 'The integral of cos(x) is sin(x) + C. Use this to find the integral of 2cos(x).',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 5x^3 with respect to x?',
                'options' => '5x^4/4, x^4, 5x^2, 15x^2',
                'answer' => '5x^4/4',
                'hint' => 'Remember that the integral of x^n is (1/(n+1))x^(n+1) + C.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of xcos(x) with respect to x?',
                'options' => 'sin(x) + xcos(x), cos(x) + xsin(x), -sin(x) + xcos(x), -cos(x) + xsin(x)',
                'answer' => 'cos(x) + xsin(x)',
                'hint' => 'Use integration by parts with u = x and dv = cos(x)dx.',
            ],
            [
                'quiz_id' => '3',
                'title' => 'What is the integral of 1/sqrt(x) with respect to x?',
                'options' => ' 2sqrt(x), 1/2sqrt(x), ln(x), x^2/2',
                'answer' => '2sqrt(x)',
                'hint' => 'Remember that the integral of 1/sqrt(x) is 2sqrt(x) + C.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 3x^2 + 2x with respect to x?',
                'options' => 'x^3 + x^2 + C, x^3 + x + C, x^2 + x + C, 3x^3/3 + x^2/2 + C',
                'answer' => '3x^3/3 + x^2/2 + C',
                'hint' => 'Use the power rule of integration, which states that the integral of x^n with respect to x is (1/(n+1))x^(n+1) + C, where C is the constant of integration.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 1/(x^2 + 1) with respect to x?',
                'options' => 'arctan(x) + C, ln(x) + C, sin(x) + C, cos(x) + C',
                'answer' => 'arctan(x) + C',
                'hint' => 'Use the substitution method and substitute u = x^2 + 1, du/dx = 2x, and dx = du/(2x).',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 2x + 3 with respect to x?',
                'options' => 'x^2 + 3x + C, 2x^2 + 3x + C, x^2 + 3, 2x + 3x^2 + C',
                'answer' => 'x^2 + 3x + C',
                'hint' => 'Use the power rule of integration and add the constant of integration at the end.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 1/x^2 with respect to x?',
                'options' => '-1/x + C, ln(x) + C, -x + C, -1/(2x) + C',
                'answer' => '-1/x + C',
                'hint' => 'Use the power rule of integration and remember that the integral of 1/x is ln|x| + C.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of e^2x + 5 with respect to x?',
                'options' => '(1/2)e^2x + 5x + C, e^2x + 5x + C, 2e^2x + 5x + C, 2e^2x + 5',
                'answer' => '(1/2)e^2x + 5x + C',
                'hint' => 'Use the linearity of integration and the power rule, and add the constant of integration at the end.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 4x^3 - 2x^2 + 5x with respect to x?',
                'options' => 'x^4/4 - 2x^3/3 + 5x^2/2 + C, 4x^4/3 - 2x^3/2 + 5x^2 + C, 4x^4/4 - 2x^3 + 5x^2/2 + C, x^4 - 2x^3/3 + 5x^2 + C',
                'answer' => 'x^4/4 - 2x^3/3 + 5x^2/2 + C',
                'hint' => 'Use the linearity of integration and the power rule, and add the constant of integration at the end',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of (2x + 1)^2 with respect to x?',
                'options' => '(2x + 1)^3/3 + C, 4x^2 + 4x + 1/3 + C, 4x^3/3 + 2x^2 + x + C, 4x^3 + 2x^2 + x + C',
                'answer' => '4x^3/3 + 2x^2 + x + C',
                'hint' => 'you can use the formula for expanding (a+b)^2 and then integrate the resulting polynomial term by term.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of ln(x) with respect to x?',
                'options' => ' xln(x) - x + C,  ln(x) + x + C, 1/x + C, e^x + C',
                'answer' => 'xln(x) - x + C',
                'hint' => 'you can use integration by substitution, where u = ln(x) and du/dx = 1/x.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 3sin(x) + 4cos(x) with respect to x?',
                'options' => '-3cos(x) + 4sin(x) + C, 3cos(x) + 4sin(x) + C, -3sin(x) - 4cos(x) + C, 3sin(x) - 4cos(x) + C',
                'answer' => '3cos(x) + 4sin(x) + C',
                'hint' => 'You can use the trigonometric identity cos^2(x) + sin^2(x) = 1 to convert the expression to a single sine or cosine term, which can be integrated easily.',
            ],
            [
                'quiz_id' => '4',
                'title' => 'What is the integral of 1/(x^3 + 1) with respect to x?',
                'options' => '(1/3)ln|x^2 - x + 1| + C, (1/3)ln|x^2 + x + 1| + C, (1/3)ln|x^3 + x + 1| + C, 1/3)ln|x^3 - x + 1| + C',
                'answer' => '(1/3)ln|x^2 + x + 1| + C',
                'hint' => 'You can use partial fractions decomposition to simplify the expression before integrating.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of x/(x^2 + 1)^2 with respect to x?',
                'options' => '(1/2)(x^2 + 1)/(x^2 + 1)^2 + C, (1/2)ln|x^2 + 1| + C, (1/2)(x^2 - 1)/(x^2 + 1)^2 + C, (1/2)arctan(x) + C',
                'answer' => '(1/2)(x^2 - 1)/(x^2 + 1)^2 + C',
                'hint' => 'For this question, try using u-substitution with u = x^2 + 1. Then rewrite the integral in terms of u and use the power rule of integration.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of sqrt(1 - x^2) with respect to x?',
                'options' => '(1/2)arcsin(x) + C, (1/2)sin(x^2) + C, (1/2)x^2 - (1/4)x^4 + C, (1/2)cos(x^2) + C',
                'answer' => '(1/2)arcsin(x) + C',
                'hint' => 'Recall that the integral of ln(x) is xln(x) - x + C. To see this, use integration by parts with u = ln(x) and dv/dx = 1/x.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of e^x/(1 + e^x) with respect to x?',
                'options' => 'ln|1 + e^x| + C, ln|e^x - 1| + C, e^x - ln|1 + e^x| + C, e^x - ln|e^x - 1| + C',
                'answer' => 'ln|e^x - 1| + C',
                'hint' => 'Use the trig identity cos(x + π/2) = sin(x) and integrate term by term.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of (x^2 + 1)/x^3 with respect to x?',
                'options' => 'ln|x| - 1/x^2 + C, 1/2ln|x^2 + 1| - 1/x + C, -1/x^2 + C, (1/2)x^2 - 1/x + C',
                'answer' => '1/2ln|x^2 + 1| - 1/x + C',
                'hint' => 'Rewrite the integrand using partial fractions, then use the natural log rule of integration for each term.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of 1/(x^3 - 1) with respect to x?',
                'options' => '(1/6)ln|x^2 + x + 1| - (1/3)ln|x - 1| + C, (1/6)ln|x^2 - x + 1| - (1/3)ln|x - 1| + C, (1/6)ln|x^2 + x + 1| + (1/3)ln|x - 1| + C, (1/6)ln|x^2 - x + 1| + (1/3)ln|x - 1| + C',
                'answer' => '(1/6)ln|x^2 + x + 1| - (1/3)ln|x - 1| + C',
                'hint' => 'Rewrite the denominator as (x - 1)(x^2 + x + 1), then use partial fractions to split the integrand into three terms. To integrate each term, use u-substitution with u = x^2 + x + 1 for the first term and u = x - 1 for the second term.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of (x^3 - x)/(x^4 + 1) with respect to x?',
                'options' => '(1/2)ln|x^4 + 1| + C, (1/4)ln|x^2 + 1| + (1/2)arctan(x^2) + C, (1/4)ln|x^2 + 1| + arctan(x) + C, (1/2)arctan(x) + C',
                'answer' => '(1/4)ln|x^2 + 1| + (1/2)arctan(x^2) + C',
                'hint' => 'Rewrite the integrand using partial fractions, then use u-substitution with u = x^2 for each term. For the arctan term, use integration by parts with u = arctan(x) and dv/dx = 1/(x^4 + 1).',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of 1/(x^4 + 1) with respect to x?',
                'options' => '(1/4)ln|x^2 - x + 1| + (1/4)ln|x^2 + x + 1| + C, (1/2)arctan(x) - (1/4)ln|x^2 - x + 1| + C, (1/2)arctan(x) - (1/4)ln|x^2 + x + 1| + C, (1/4)ln|x^2 - x + 1| - (1/4)ln|x^2 + x + 1| + C',
                'answer' => '(1/2)arctan(x) - (1/4)ln|x^2 + x + 1| + C',
                'hint' => 'Try using the substitution u = x^2 to simplify the expression.Use partial fractions decomposition to express 1/(x^4 + 1) as a sum of simpler fractions.Look for a pattern in the integrals of similar expressions and try to apply it.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of (sin(x))^3 with respect to x?',
                'options' => '-cos(x) - (1/3)cos^3(x) + C, cos(x) + (1/3)cos^3(x) + C, -cos(x) + (1/3)cos^3(x) + C, cos(x) - (1/3)cos^3(x) + C',
                'answer' => '-cos(x) - (1/3)cos^3(x) + C',
                'hint' => 'Try using the identity sin^3(x) = (3sin(x) - sin(3x))/4 to simplify the expression.Use integration by substitution with u = cos(x) or u = sin(x).Look for a pattern in the integrals of similar expressions and try to apply it.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of (x^2 - 1)/(x^4 + 1) with respect to x?',
                'options' => '(1/2)ln|x^2 - x + 1| - (1/2)ln|x^2 + x + 1| + C, (1/4)ln|x^2 - x + 1| + (1/4)ln|x^2 + x + 1| + C, (1/2)arctan(x) - (1/4)ln|x^2 - x + 1| + C, (1/2)arctan(x) - (1/4)ln|x^2 + x + 1| + C',
                'answer' => '(1/2)arctan(x) - (1/4)ln|x^2 + x + 1| + C',
                'hint' => 'Try using the substitution u = x^2 to simplify the expression.Use partial fractions decomposition to express (x^2 - 1)/(x^4 + 1) as a sum of simpler fractions.Look for a pattern in the integrals of similar expressions and try to apply it.',
            ],
            [
                'quiz_id' => '5',
                'title' => 'What is the integral of e^(2x)sin(3x) with respect to x?',
                'options' => '(1/13)e^(2x)(3sin(3x) - 2cos(3x)) + C, (1/13)e^(2x)(2sin(3x) - 3cos(3x)) + C, (1/13)e^(2x)(3sin(3x) + 2cos(3x)) + C, (1/13)e^(2x)(2sin(3x) + 3cos(3x)) + C',
                'answer' => '(1/13)e^(2x)(2sin(3x) - 3cos(3x)) + C',
                'hint' => 'Try using integration by parts with u = sin(3x) and dv = e^(2x) dx.Use the identity sin(3x) = (1/2i)(e^(3ix) - e^(-3ix)) to simplify the expression.Look for a pattern in the integrals of similar expressions and try to apply it.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of x^2 * cos(x) dx?',
                'options' => '(x^2/2) * sin(x) + x * cos(x) + C, (x^2/2) * cos(x) + x * sin(x) + C, (x^2/2) * sin(x) + x * cos(x) + C, (x^2/2) * sin(x) - x * cos(x) + C',
                'answer' => '(x^2/2) * sin(x) + x * cos(x) + C',
                'hint' => 'For integration involving the product of a polynomial and a trigonometric function, you can use integration by parts. Try choosing the polynomial as the first function and the trigonometric function as the second function.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of sin^2(x) * cos(x) dx?',
                'options' => '-(cos^3(x))/3 + C, -(cos^3(x))/2 + C, (cos^3(x))/3 + C, (cos^3(x))/2 + C',
                'answer' => '-(cos^3(x))/3 + C',
                'hint' => 'Use the identity sin^2(x) = (1-cos(2x))/2 and simplify the integral before proceeding with integration by substitution.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of (ln x)/x^2 dx?',
                'options' => 'ln(x) - (1/x) + C, -ln(x) - (1/x) + C, ln(x) + (1/x) + C, -ln(x) + (1/x) + C',
                'answer' => '-ln(x) + (1/x) + C',
                'hint' => 'For integrals involving the natural logarithm and a power of x, try using integration by substitution.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of 1/(x^3 + 1) dx?',
                'options' => '(1/3)ln(x^2 - x + 1) + C, (1/3)ln(x^2 + x + 1) + C, (1/3)ln(x^3 + 1) + C, (1/3)ln(x^2 + 2x + 1) + C',
                'answer' => '(1/3)ln(x^2 - x + 1) + C',
                'hint' => 'Use partial fractions to decompose the integrand into a sum of simpler fractions, and then use the inverse tangent substitution to integrate each term.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of (1 + tan^2(x))/cos^2(x) dx?',
                'options' => 'tan(x) + C, sec(x) + C, ln|sec(x) + tan(x)| + C, ln|cos(x) - sin(x)| + C',
                'answer' => 'ln|sec(x) + tan(x)| + C',
                'hint' => 'Use the Pythagorean identity tan^2(x) + 1 = sec^2(x) to simplify the integrand, and then use the substitution u = tan(x) + sec(x).',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of (1 + e^x)/(1 + e^(2x)) dx?',
                'options' => 'ln(1 + e^x) + (1/2)ln(1 - e^x) + C, ln(1 + e^x) - (1/2)ln(1 - e^x) + C, ln(1 - e^x) + (1/2)ln(1 + e^x) + C, ln(1 - e^x) - (1/2)ln(1 + e^x) + C',
                'answer' => 'ln(1 + e^x) - (1/2)ln(1 - e^x) + C',
                'hint' => 'Use integration by parts, with e^x as the first function and sin(x) as the second function. After one round of integration by parts, you will get a similar integral with a negative sign, which you can then add to the original integral to get the final answer.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of e^x * sin(x) dx?',
                'options' => '(e^x/2) * (sin(x) - cos(x)) + C, (e^x/2) * (sin(x) + cos(x)) + C, (e^x/2) * (cos(x) - sin(x)) + C, (e^x/2) * (cos(x) + sin(x)) + C',
                'answer' => '(e^x/2) * (cos(x) - sin(x)) + C',
                'hint' => 'Use integration by parts, with e^x as the first function and cos(x) as the second function. After one round of integration by parts, you will get a similar integral with a positive sign, which you can then subtract from the original integral to get the final answer.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of sqrt(1 - x^2) with respect to x?',
                'options' => '(1/2)arcsin(x) + C, (1/2)sin(x^2) + C, (1/2)x^2 - (1/4)x^4 + C, (1/2)cos(x^2) + C',
                'answer' => '(1/2)arcsin(x) + C',
                'hint' => 'This integral involves a trigonometric substitution. Let x = sin(t) and then use the Pythagorean identity to express sqrt(1 - x^2) in terms of sin(t) and cos(t).',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of e^x/(1 + e^x) with respect to x?',
                'options' => 'ln|1 + e^x| + C, ln|e^x - 1| + C, e^x - ln|1 + e^x| + C, e^x - ln|e^x - 1| + C',
                'answer' => 'ln|e^x - 1| + C',
                'hint' => 'Use the substitution u = 1 + e^x and then simplify the integral using algebraic manipulation.',
            ],
            [
                'quiz_id' => '6',
                'title' => 'What is the integral of (x^2 + 1)/x^3 with respect to x?',
                'options' => 'ln|x| - 1/x^2 + C, 1/2ln|x^2 + 1| - 1/x + C, -1/x^2 + C, (1/2)x^2 - 1/x + C',
                'answer' => '1/2ln|x^2 + 1| - 1/x + C',
                'hint' => 'Simplify the integrand by expressing (x^2 + 1)/x^3 as x^(-2) + x^(-3) and then integrate each term separately using the power rule of integration.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the value of the definite integral: ∫[0,π/2] (x^2sinx) dx',
                'options' => '1/2 - π/4, 1/2 + π/4, 1/2 - π/2, 1/2 + π/2',
                'answer' => '1/2 - π/4',
                'hint' => 'You can integrate by parts to solve this integral. Let u = x^2 and dv = sin(x) dx, then find du and v using differentiation and integration respectively. Finally, apply the limits of integration and simplify the expression.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the indefinite integral: ∫(e^(x^2))(x) dx',
                'options' => '(1/2)e^(x^2) + C, (1/2)e^(-x^2) + C, (1/2)sqrt(π)e^(x^2) + C, (1/2)sqrt(π)e^(-x^2) + C',
                'answer' => '(1/2)sqrt(π)e^(x^2) + C',
                'hint' => 'Try u-substitution by setting u = x^2 and du = 2x dx. This will allow you to rewrite the integral in terms of e^u and du, which can be integrated using a simple power rule for exponential functions. Don\'t forget to substitute back for x in the final answer.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the value of the definite integral: ∫[-π/2,π/2] (x^2cosx) dx',
                'options' => '4/3π^2, -2π^2/3, 2π^2/3, -4/3π^2',
                'answer' => '-2π^2/3',
                'hint' => 'Try integrating by parts twice, using $u=x^2$ and $dv=\\cos x,dx$ in the first integration by parts, and $u=x$ and $dv=x\\cos x,dx$ in the second integration by parts.Then, evaluate the integral using the limits of integration.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the indefinite integral: ∫(lnx/x^2) dx',
                'options' => ' ln|x|/x + C, -ln|x|/x + C, -ln|x| + C, ln|x| + C',
                'answer' => '-ln|x|/x + C',
                'hint' => 'The integral is of the form ln(x)/x^k, which can be integrated using integration by parts. Using this method, we get the answer as -ln|x|/x + C.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the value of the definite integral: ∫[0,π/2] (cosx/x) dx',
                'options' => 'ln2, lnπ/2, ln(π/2)^2, lnπ - ln2',
                'answer' => 'ln2',
                'hint' => 'Try using integration by parts with u = 1/x and dv = cos(x) dx.Note that the integral is improper at x = 0, so you\'ll need to take the limit as the lower bound approaches 0.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the indefinite integral: ∫(sinx)/(sinx+cosx) dx',
                'options' => 'ln|sinx+cosx| + C, ln|sinx-cosx| + C, -ln|sinx+cosx| + C, -ln|sinx-cosx| + C',
                'answer' => '-ln|sinx+cosx| + C',
                'hint' => 'One possible way is to use the substitution u = sin(x) + cos(x), then simplify the integral using trigonometric identities and algebraic manipulations, and finally use the logarithmic property of integrals to arrive at the answer.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the value of the definite integral: ∫[0,1] (ln(x+1)/x) dx',
                'options' => 'ln2, ln3/2, ln4/3, ln(π/2)',
                'answer' => 'ln(π/2)',
                'hint' => 'Think about the properties of the natural logarithm and how they can be used to simplify the integrand. You can start by using the rule ln(a*b) = ln(a) + ln(b) to rewrite the integrand as ln(x+1) - ln(x). Then, use the formula for the integral of ln(x) to solve for the definite integral from 0 to 1.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the indefinite integral: ∫(1/(1+sinx)) dx',
                'options' => 'tan(x/2) + C, ln|cos(x/2)| + C, ln|1+sin(x/2)| + C, ln|1-sin(x/2)| + C',
                'answer' => 'ln|cos(x/2)| + C',
                'hint' => 'Try using the substitution u = tan(x/2) and the half-angle identity for cosine to simplify the integrand. Then use logarithmic properties to obtain the final answer.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'Find the value of the definite integral: ∫[0,π/4] (tanx)^(1/3) dx',
                'options' => '(2/3)(π/2)^(3/2), (2/3)(π/4)^(3/2), (3/5)(π/4)^(5/3), (3/5)(π/2)^(5/3)',
                'answer' => '(3/5)(π/4)^(5/3)',
                'hint' => 'Start by substituting u = tan(x), then express the integral in terms of u and dx. Then use the identity 1 + tan^2(x) = sec^2(x) to simplify the integrand. Finally, use the substitution u = tan(x) again to express the integral in terms of u only, and then use the power rule of integration.',
            ],
            [
                'quiz_id' => '7',
                'title' => 'What is the integral of (2x + 1)^2 with respect to x?',
                'options' => '(2x + 1)^3/3 + C, 4x^2 + 4x + 1/3 + C, 4x^3/3 + 2x^2 + x + C, 4x^3 + 2x^2 + x + C',
                'answer' => '4x^3/3 + 2x^2 + x + C',
                'hint' => 'To integrate (2x + 1)^2, you can use the power rule of integration which states that the integral of x^n with respect to x is (x^(n+1))/(n+1) + C. You can also expand the expression (2x + 1)^2 using the binomial theorem and then integrate each term separately.',
            ],
        ]);
    }
}
