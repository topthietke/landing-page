import 'package:flutter/material.dart';
import 'package:hello_world/components/text.dart';
import 'package:hello_world/layouts/abouts/address_bar.dart';
import 'package:hello_world/layouts/abouts/social_chip.dart';
// ─── ABOUT TAB ────────────────────────────────────────────────────────────────

class AboutTab extends StatelessWidget {  
  const AboutTab({super.key});
  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: SingleChildScrollView(
        padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 32),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            // Address bar mock
            AddressBar(),
            const SizedBox(height: 32),
            // Avatar
            Container(
              width: 110,
              height: 110,
              decoration: BoxDecoration(
                shape: BoxShape.circle,
                border: Border.all(color: Colors.white24, width: 2),
                boxShadow: [
                  BoxShadow(
                    color: Colors.black.withOpacity(0.4),
                    blurRadius: 20,
                    spreadRadius: 2,
                  ),
                ],
              ),
              child: ClipOval(
                child: Image.asset(
                  'assets/images/avatar.jpg',
                  fit: BoxFit.cover,
                  errorBuilder: (_, __, ___) => Container(
                    color: const Color(0xFF333333),
                    child: const Icon(Icons.person, size: 50, color: Colors.white54),
                  ),
                ),
              ),
            ),
            const SizedBox(height: 20),
            // Name
            const Text(
              MyText.personName,
              style: TextStyle(
                fontSize: 28,
                fontWeight: FontWeight.w700,
                color: Colors.white,
                letterSpacing: 0.5,
              ),
            ),
            const SizedBox(height: 12),
            // Bio
            Text(
              MyText.sologanTitle,
              textAlign: TextAlign.center,
              style: TextStyle(
                fontSize: 15,
                color: Colors.white.withOpacity(0.65),
                height: 1.6,
              ),
            ),
            const SizedBox(height: 28),
            // Social links row 1
            Wrap(
              spacing: 16,
              runSpacing: 12,
              alignment: WrapAlignment.start,
              children: [
                const SocialChip(icon: Icons.code, label: MyText.github, color: Color(0xFFEEEEEE)),
                const SocialChip(icon: Icons.language, label: MyText.website, color: Color(0xFF29B6F6)),
                const SocialChip(icon: Icons.facebook, label: MyText.facebook, color: Color(0xFF66BB6A)),
                const SocialChip(icon: Icons.camera_alt, label: 'Instagram', color: Color(0xFFEC407A)),
              ],
            ),
            const SizedBox(height: 10),            
          ],
        ),
      ),
    );
  }
}
