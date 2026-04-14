import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Auth App',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        fontFamily: 'Poppins',
        colorScheme: ColorScheme.fromSeed(seedColor: const Color(0xFFFAB81B)),
      ),
      home: const LoginScreen(),
    );
  }
}

// ─────────────────────────────────────────────
// SHARED WIDGETS
// ─────────────────────────────────────────────

/// Flame SVG logo rendered via CustomPainter
class FlameLogo extends StatelessWidget {
  const FlameLogo({super.key});

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: 32,
      height: 40,
      child: CustomPaint(painter: _FlameLogoPainter()),
    );
  }
}

class _FlameLogoPainter extends CustomPainter {
  @override
  void paint(Canvas canvas, Size size) {
    final paint = Paint()
      ..color = const Color(0xFF1A1A1A)
      ..style = PaintingStyle.fill;

    final path = Path();
    // Outer flame shape
    path.moveTo(size.width * 0.5, 0);
    path.cubicTo(
      size.width * 0.9, size.height * 0.2,
      size.width * 1.0, size.height * 0.5,
      size.width * 0.75, size.height * 0.75,
    );
    path.cubicTo(
      size.width * 0.9, size.height * 0.55,
      size.width * 0.7, size.height * 0.45,
      size.width * 0.6, size.height * 0.6,
    );
    path.cubicTo(
      size.width * 0.8, size.height * 0.35,
      size.width * 0.55, size.height * 0.2,
      size.width * 0.5, size.height * 0.35,
    );
    path.cubicTo(
      size.width * 0.45, size.height * 0.2,
      size.width * 0.2, size.height * 0.35,
      size.width * 0.4, size.height * 0.6,
    );
    path.cubicTo(
      size.width * 0.3, size.height * 0.45,
      size.width * 0.1, size.height * 0.55,
      size.width * 0.25, size.height * 0.75,
    );
    path.cubicTo(
      size.width * 0.0, size.height * 0.5,
      size.width * 0.1, size.height * 0.2,
      size.width * 0.5, 0,
    );
    path.close();

    // Inner teardrop cutout (white)
    canvas.drawPath(path, paint);

    final innerPaint = Paint()
      ..color = Colors.white
      ..style = PaintingStyle.fill;
    final inner = Path();
    inner.moveTo(size.width * 0.5, size.height * 0.45);
    inner.cubicTo(
      size.width * 0.62, size.height * 0.55,
      size.width * 0.62, size.height * 0.72,
      size.width * 0.5, size.height * 0.78,
    );
    inner.cubicTo(
      size.width * 0.38, size.height * 0.72,
      size.width * 0.38, size.height * 0.55,
      size.width * 0.5, size.height * 0.45,
    );
    inner.close();
    canvas.drawPath(inner, innerPaint);
  }

  @override
  bool shouldRepaint(covariant CustomPainter oldDelegate) => false;
}

/// Wavy background decoration matching the design
class WavyBackground extends StatelessWidget {
  const WavyBackground({super.key});

  @override
  Widget build(BuildContext context) {
    return SizedBox.expand(
      child: CustomPaint(painter: _WavyBgPainter()),
    );
  }
}

class _WavyBgPainter extends CustomPainter {
  @override
  void paint(Canvas canvas, Size size) {
    // Light yellow top-left fill
    final fillPaint = Paint()
      ..shader = RadialGradient(
        center: const Alignment(-1, -1),
        radius: 1.2,
        colors: [
          const Color(0xFFFFC933),
          const Color(0xFFFFF5CC),
        ],
      ).createShader(Rect.fromLTWH(0, 0, size.width * 0.6, size.height * 0.55));

    final fillPath = Path();
    fillPath.moveTo(0, 0);
    fillPath.lineTo(size.width * 0.55, 0);
    fillPath.cubicTo(
      size.width * 0.55, size.height * 0.05,
      size.width * 0.45, size.height * 0.08,
      size.width * 0.38, size.height * 0.12,
    );
    fillPath.cubicTo(
      size.width * 0.28, size.height * 0.18,
      size.width * 0.35, size.height * 0.28,
      size.width * 0.22, size.height * 0.35,
    );
    fillPath.cubicTo(
      size.width * 0.12, size.height * 0.40,
      size.width * 0.08, size.height * 0.50,
      0, size.height * 0.55,
    );
    fillPath.close();
    canvas.drawPath(fillPath, fillPaint);

    // Amber wavy stripe
    final wavePaint = Paint()
      ..color = const Color(0xFFFAB81B)
      ..style = PaintingStyle.fill;

    final wavePath = Path();
    // Outer edge of wave (left boundary)
    wavePath.moveTo(0, size.height * 0.02);
    wavePath.cubicTo(
      size.width * 0.05, size.height * 0.02,
      size.width * 0.15, size.height * 0.04,
      size.width * 0.22, size.height * 0.09,
    );
    wavePath.cubicTo(
      size.width * 0.35, size.height * 0.18,
      size.width * 0.20, size.height * 0.30,
      size.width * 0.18, size.height * 0.38,
    );
    wavePath.cubicTo(
      size.width * 0.15, size.height * 0.48,
      size.width * 0.10, size.height * 0.55,
      0, size.height * 0.60,
    );
    // Inner edge of wave (right boundary)
    wavePath.lineTo(0, size.height * 0.50);
    wavePath.cubicTo(
      size.width * 0.06, size.height * 0.46,
      size.width * 0.10, size.height * 0.40,
      size.width * 0.10, size.height * 0.36,
    );
    wavePath.cubicTo(
      size.width * 0.12, size.height * 0.25,
      size.width * 0.28, size.height * 0.16,
      size.width * 0.14, size.height * 0.06,
    );
    wavePath.cubicTo(
      size.width * 0.08, size.height * 0.01,
      size.width * 0.03, 0,
      0, 0,
    );
    wavePath.close();
    canvas.drawPath(wavePath, wavePaint);

    // Second wave stripe (the S-curve going to the right)
    final wave2Path = Path();
    wave2Path.moveTo(size.width * 0.20, 0);
    wave2Path.cubicTo(
      size.width * 0.40, 0,
      size.width * 0.55, size.height * 0.02,
      size.width * 0.55, size.height * 0.05,
    );
    wave2Path.cubicTo(
      size.width * 0.55, size.height * 0.08,
      size.width * 0.42, size.height * 0.10,
      size.width * 0.35, size.height * 0.14,
    );
    wave2Path.cubicTo(
      size.width * 0.24, size.height * 0.20,
      size.width * 0.30, size.height * 0.30,
      size.width * 0.19, size.height * 0.38,
    );
    wave2Path.cubicTo(
      size.width * 0.10, size.height * 0.43,
      size.width * 0.06, size.height * 0.48,
      size.width * 0.06, size.height * 0.52,
    );
    wave2Path.lineTo(0, size.height * 0.52);
    wave2Path.lineTo(0, size.height * 0.44);
    wave2Path.cubicTo(
      size.width * 0.08, size.height * 0.42,
      size.width * 0.12, size.height * 0.36,
      size.width * 0.13, size.height * 0.32,
    );
    wave2Path.cubicTo(
      size.width * 0.22, size.height * 0.22,
      size.width * 0.16, size.height * 0.12,
      size.width * 0.28, size.height * 0.06,
    );
    wave2Path.cubicTo(
      size.width * 0.34, size.height * 0.03,
      size.width * 0.42, size.height * 0.01,
      size.width * 0.43, 0,
    );
    wave2Path.close();
    canvas.drawPath(wave2Path, wavePaint);

    // Bottom-right warm glow
    final glowPaint = Paint()
      ..shader = RadialGradient(
        center: const Alignment(1.2, 1.4),
        radius: 0.8,
        colors: [
          const Color(0xFFFFE580).withOpacity(0.6),
          Colors.transparent,
        ],
      ).createShader(Rect.fromLTWH(0, 0, size.width, size.height));
    canvas.drawRect(Rect.fromLTWH(0, 0, size.width, size.height), glowPaint);
  }

  @override
  bool shouldRepaint(covariant CustomPainter oldDelegate) => false;
}

/// Underline text field matching the design
class UnderlineInputField extends StatefulWidget {
  final String hint;
  final IconData icon;
  final bool isPassword;
  final TextEditingController? controller;

  const UnderlineInputField({
    super.key,
    required this.hint,
    required this.icon,
    this.isPassword = false,
    this.controller,
  });

  @override
  State<UnderlineInputField> createState() => _UnderlineInputFieldState();
}

class _UnderlineInputFieldState extends State<UnderlineInputField> {
  bool _obscure = true;

  @override
  Widget build(BuildContext context) {
    const amber = Color(0xFFFAB81B);

    return TextField(
      controller: widget.controller,
      obscureText: widget.isPassword && _obscure,
      style: const TextStyle(
        fontSize: 16,
        color: Color(0xFF1A1A1A),
        fontWeight: FontWeight.w400,
      ),
      decoration: InputDecoration(
        hintText: widget.hint,
        hintStyle: const TextStyle(
          color: amber,
          fontSize: 16,
          fontWeight: FontWeight.w400,
        ),
        prefixIcon: Icon(widget.icon, color: amber, size: 20),
        suffixIcon: widget.isPassword
            ? GestureDetector(
                onTap: () => setState(() => _obscure = !_obscure),
                child: Icon(
                  _obscure ? Icons.visibility_off : Icons.visibility,
                  color: const Color(0xFF444444),
                  size: 20,
                ),
              )
            : null,
        enabledBorder: const UnderlineInputBorder(
          borderSide: BorderSide(color: amber, width: 1.2),
        ),
        focusedBorder: const UnderlineInputBorder(
          borderSide: BorderSide(color: amber, width: 2),
        ),
        filled: false,
        contentPadding: const EdgeInsets.only(bottom: 8, top: 8),
      ),
    );
  }
}

// ─────────────────────────────────────────────
// LOGIN SCREEN
// ─────────────────────────────────────────────

class LoginScreen extends StatelessWidget {
  const LoginScreen({super.key});

  @override
  Widget build(BuildContext context) {
    const amber = Color(0xFFFAB81B);

    return Scaffold(
      body: Stack(
        children: [
          // Background
          const Positioned.fill(child: WavyBackground()),

          SafeArea(
            child: Column(
              children: [
                // Top bar
                Padding(
                  padding: const EdgeInsets.symmetric(
                      horizontal: 24, vertical: 16),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      const FlameLogo(),
                      const Icon(Icons.menu,
                          size: 28, color: Color(0xFF1A1A1A)),
                    ],
                  ),
                ),

                const SizedBox(height: 80),

                // Form area
                Expanded(
                  child: Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 32),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const Text(
                          'Login',
                          style: TextStyle(
                            fontSize: 36,
                            fontWeight: FontWeight.w800,
                            color: Color(0xFF1A1A1A),
                            letterSpacing: -0.5,
                          ),
                        ),
                        const SizedBox(height: 36),

                        // Email
                        const UnderlineInputField(
                          hint: 'Email',
                          icon: Icons.email,
                        ),
                        const SizedBox(height: 28),

                        // Password
                        const UnderlineInputField(
                          hint: 'Password',
                          icon: Icons.lock,
                          isPassword: true,
                        ),
                        const SizedBox(height: 16),

                        // Remember me / Forgot
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            Row(
                              children: [
                                Container(
                                  width: 20,
                                  height: 20,
                                  decoration: BoxDecoration(
                                    color: const Color(0xFFFFF0B0),
                                    border: Border.all(
                                        color: const Color(0xFFDDD0A0),
                                        width: 1),
                                    borderRadius: BorderRadius.circular(3),
                                  ),
                                ),
                                const SizedBox(width: 8),
                                const Text('Remember me',
                                    style: TextStyle(
                                        fontSize: 14,
                                        color: Color(0xFF444444))),
                              ],
                            ),
                            const Text(
                              'Forgot password?',
                              style: TextStyle(
                                  fontSize: 14, color: Color(0xFF444444)),
                            ),
                          ],
                        ),
                        const SizedBox(height: 32),

                        // Login button
                        SizedBox(
                          width: double.infinity,
                          height: 54,
                          child: ElevatedButton(
                            onPressed: () {},
                            style: ElevatedButton.styleFrom(
                              backgroundColor: amber,
                              foregroundColor: Colors.white,
                              elevation: 0,
                              shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(12),
                              ),
                            ),
                            child: const Text(
                              'LOGIN',
                              style: TextStyle(
                                fontSize: 16,
                                fontWeight: FontWeight.w800,
                                letterSpacing: 1.5,
                                color: Color(0xFF1A1A1A),
                              ),
                            ),
                          ),
                        ),
                        const SizedBox(height: 24),

                        // Sign Up link
                        Center(
                          child: Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              const Text(
                                "Don't have an account ? ",
                                style: TextStyle(
                                    fontSize: 14, color: Color(0xFF1A1A1A)),
                              ),
                              GestureDetector(
                                onTap: () => Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                    builder: (_) => const SignUpScreen(),
                                  ),
                                ),
                                child: const Text(
                                  'Sign Up',
                                  style: TextStyle(
                                    fontSize: 14,
                                    fontWeight: FontWeight.w700,
                                    color: amber,
                                    decoration: TextDecoration.underline,
                                    decorationColor: amber,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}

// ─────────────────────────────────────────────
// SIGN UP SCREEN
// ─────────────────────────────────────────────

class SignUpScreen extends StatelessWidget {
  const SignUpScreen({super.key});

  @override
  Widget build(BuildContext context) {
    const amber = Color(0xFFFAB81B);

    return Scaffold(
      body: Stack(
        children: [
          const Positioned.fill(child: WavyBackground()),

          SafeArea(
            child: Column(
              children: [
                // Top bar
                Padding(
                  padding: const EdgeInsets.symmetric(
                      horizontal: 24, vertical: 16),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      const FlameLogo(),
                      const Icon(Icons.menu,
                          size: 28, color: Color(0xFF1A1A1A)),
                    ],
                  ),
                ),

                const SizedBox(height: 60),

                Expanded(
                  child: SingleChildScrollView(
                    padding: const EdgeInsets.symmetric(horizontal: 32),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        const Text(
                          'Create an account',
                          style: TextStyle(
                            fontSize: 30,
                            fontWeight: FontWeight.w800,
                            color: Color(0xFF1A1A1A),
                            letterSpacing: -0.5,
                          ),
                        ),
                        const SizedBox(height: 32),

                        // Name
                        const UnderlineInputField(
                          hint: 'Name',
                          icon: Icons.person,
                        ),
                        const SizedBox(height: 28),

                        // Email
                        const UnderlineInputField(
                          hint: 'Email',
                          icon: Icons.email,
                        ),
                        const SizedBox(height: 28),

                        // Password
                        const UnderlineInputField(
                          hint: 'Password',
                          icon: Icons.lock,
                          isPassword: true,
                        ),
                        const SizedBox(height: 28),

                        // Confirm Password
                        const UnderlineInputField(
                          hint: 'Confirm Password',
                          icon: Icons.lock,
                          isPassword: true,
                        ),
                        const SizedBox(height: 16),

                        // Remember me / Forgot
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            Row(
                              children: [
                                Container(
                                  width: 20,
                                  height: 20,
                                  decoration: BoxDecoration(
                                    color: const Color(0xFFFFF0B0),
                                    border: Border.all(
                                        color: const Color(0xFFDDD0A0),
                                        width: 1),
                                    borderRadius: BorderRadius.circular(3),
                                  ),
                                ),
                                const SizedBox(width: 8),
                                const Text('Remember me',
                                    style: TextStyle(
                                        fontSize: 14,
                                        color: Color(0xFF444444))),
                              ],
                            ),
                            const Text(
                              'Forgot password?',
                              style: TextStyle(
                                  fontSize: 14, color: Color(0xFF444444)),
                            ),
                          ],
                        ),
                        const SizedBox(height: 32),

                        // Sign Up button
                        SizedBox(
                          width: double.infinity,
                          height: 54,
                          child: ElevatedButton(
                            onPressed: () {},
                            style: ElevatedButton.styleFrom(
                              backgroundColor: amber,
                              foregroundColor: Colors.white,
                              elevation: 0,
                              shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(12),
                              ),
                            ),
                            child: const Text(
                              'SIGN UP',
                              style: TextStyle(
                                fontSize: 16,
                                fontWeight: FontWeight.w800,
                                letterSpacing: 1.5,
                                color: Color(0xFF1A1A1A),
                              ),
                            ),
                          ),
                        ),
                        const SizedBox(height: 24),

                        // Login link
                        Center(
                          child: Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              const Text(
                                'Already have an account ? ',
                                style: TextStyle(
                                    fontSize: 14, color: Color(0xFF1A1A1A)),
                              ),
                              GestureDetector(
                                onTap: () => Navigator.pop(context),
                                child: const Text(
                                  'Login Up',
                                  style: TextStyle(
                                    fontSize: 14,
                                    fontWeight: FontWeight.w700,
                                    color: amber,
                                    decoration: TextDecoration.underline,
                                    decorationColor: amber,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(height: 32),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}