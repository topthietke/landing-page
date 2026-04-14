import 'package:flutter/material.dart';


class AddressBar extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Container(
      height: 36,
      decoration: BoxDecoration(
        color: const Color(0xFF2E2E2E),
        borderRadius: BorderRadius.circular(8),
      ),
      padding: const EdgeInsets.symmetric(horizontal: 12),
      child: Row(
        children: [
          Icon(Icons.lock_outline, size: 12, color: Colors.white38),
          const SizedBox(width: 6),
          const Expanded(
            child: Text(
              'adityag.me/#/',
              style: TextStyle(fontSize: 12, color: Colors.white54),
            ),
          ),
          Icon(Icons.more_vert, size: 16, color: Colors.white38),
        ],
      ),
    );
  }
}
