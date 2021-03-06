USE [RAMEX]
GO

/****** Object:  Table [dbo].[Motif_Relance]    Script Date: 28/12/2020 10:25:39 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Motif_Relance](
	[id_motif] [int] NOT NULL,
	[desc_motif] [varchar](300) NULL,
 CONSTRAINT [PK_Motif_Relance] PRIMARY KEY CLUSTERED
(
	[id_motif] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
