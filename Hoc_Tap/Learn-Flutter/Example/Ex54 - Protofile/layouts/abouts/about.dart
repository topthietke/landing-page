import 'package:flutter/material.dart';
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
                child: Image.network(
                  'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200',
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
              'Trần Ngọc Tú',
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
              'Android. Flutter. Cricket. Music.\nLikes Traveling.',
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
              alignment: WrapAlignment.center,
              children: [
                const SocialChip(icon: Icons.code, label: 'Github', color: Color(0xFFEEEEEE)),
                const SocialChip(icon: Icons.chat_bubble, label: 'Twitter', color: Color(0xFF29B6F6)),
                const SocialChip(icon: Icons.menu_book, label: 'Medium', color: Color(0xFF66BB6A)),
              ],
            ),
            const SizedBox(height: 10),
            Wrap(
              spacing: 16,
              runSpacing: 12,
              alignment: WrapAlignment.center,
              children: [
                const SocialChip(icon: Icons.camera_alt, label: 'Instagram', color: Color(0xFFEC407A)),
                const SocialChip(icon: Icons.thumb_up, label: 'Facebook', color: Color(0xFF42A5F5)),
                const SocialChip(icon: Icons.work, label: 'LinkedIn', color: Color(0xFF1565C0)),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
